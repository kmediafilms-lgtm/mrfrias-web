import { chromium } from '@playwright/test';
import fs from 'fs';

const shotsDir = 'qa/screenshots';
fs.mkdirSync(shotsDir, { recursive: true });

const targets = [
  {
    name: 'template',
    url: 'https://www.ex-coders.com/php-template/fresheat/index-one-page.php'
  },
  {
    name: 'rebuild',
    url: 'http://localhost:8765/index.php'
  }
];

const viewports = [
  { name: 'desktop', width: 1440, height: 900 },
  { name: 'mobile', width: 390, height: 844 }
];

const browser = await chromium.launch({
  executablePath: '/opt/pw-browsers/chromium-1194/chrome-linux/chrome',
  args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-dev-shm-usage']
});

for (const target of targets) {
  for (const viewport of viewports) {
    console.log(`Capturing ${target.name} @ ${viewport.name}...`);
    const page = await browser.newPage({ viewport, ignoreHTTPSErrors: true });
    try {
      await page.goto(target.url, { waitUntil: 'networkidle', timeout: 30000 });
      await page.waitForTimeout(2000);
      await page.screenshot({
        path: `${shotsDir}/${target.name}-${viewport.name}.png`,
        fullPage: true
      });
      console.log(`  → Saved: ${shotsDir}/${target.name}-${viewport.name}.png`);
    } catch (e) {
      console.error(`  ERROR on ${target.name} ${viewport.name}: ${e.message}`);
    }
    await page.close();
  }
}

await browser.close();
console.log('Done.');
