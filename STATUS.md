# STATUS — Mr. Frías Food Truck Rebuild

**Última actualización**: 2026-06-01

Documento vivo con el progreso real del proyecto. Reemplaza al README.md anterior cuando hay decisiones nuevas.

---

## ✅ Lo que está hecho y funcionando

### Sitio en producción
- **URL**: https://mrfrias-demo.pages.dev
- **Hosting**: Cloudflare Pages, proyecto `mrfrias-demo`
- **Lighthouse**: 100/100/100/100 (Accessibility / Best Practices / SEO / Agentic Browsing)
- **Tiempo de carga**: 5.8s (vs 7.36s del sitio original)

### Estructura visual implementada
- Header completo del template (cuadrado blanco logo + topbar rojo + nav azul oscuro + CTA amarillo)
- Hero con `bannerBG1_1.jpg` real (brick rojizo + piso madera) + 3 slides con foto transparente flotante
- Antojos: 7 cards horizontales con thumbs circulares (sin círculo punteado decorativo)
- Sucursales: 6 cards estilo chefe-card sobre fondo brick
- Acerca de nosotros: 2 col foto rectangular + texto con bold
- Marquee semi-transparente con nombres de antojos
- Galería con fondo brick
- Horario, CTA Final, Contacto, Footer con "Powered by WE.DO Workspace"

### Repo GitHub
- **URL**: https://github.com/kmediafilms-lgtm/mrfrias-web
- **Branch principal**: `main`
- **Commits**: 2 (initial + Sveltia CMS)
- **Visibilidad**: público

### Figma design system
- **URL**: https://www.figma.com/design/am7dUISl1eZhcv36p3CiNp
- **Pages creadas** (3, límite del plan Starter):
  - `01 — Brand & Components`: 27 styles (colores, text, shadows) + 4 componentes (Botón Primary, Botón Yellow, WhatsApp Floating, Card Sucursal)
  - `02 — Designs (Desktop + Mobile)`: skeleton de los 2 frames con 21 secciones placeholder
  - `03 — Assets & Notes`: pendientes con Robert + assets disponibles + links útiles
- **Fuentes cargadas**: Epilogue Black (display), Inter Bold/Regular (body)

### Handoff Figma docs (en disco)
**Path**: `/Users/kmediafilms/Documents/web-rebuilds/mrfrias/FIGMA_HANDOFF_MR_FRIAS/`

10 archivos .md (~2900 líneas total):
1. `00-resumen-proyecto.md` — quién, qué, problema actual
2. `01-brand-direccion.md` — paleta, tipografía, tono, palabras prohibidas
3. `02-estructura-web.md` — 10 secciones detalladas
4. `03-copy-aprobado.md` — todos los textos verbatim
5. `04-assets-inventario.md` — clasificación de cada archivo
6. `05-wireframe-desktop.md` — composición 1440px
7. `06-wireframe-mobile.md` — composición 390px
8. `07-componentes-ui.md` — 13 componentes con props/estados
9. `08-secciones-pendientes.md` — qué falta validar con Robert
10. `09-instrucciones-figma.md` — orden de armado por pages

+ Subcarpeta `assets-seleccionados/` con 24 assets clasificados en 5 categorías.

### Skills instalados (Claude Code)
- `web-design-guidelines` (Vercel) — audit técnico
- `frontend-design` (Anthropic) — componentes con criterio visual
- `firecrawl` + 30 skills firecrawl — scrape, search, qa, seo-audit, website-design-clone, etc.
- `ui-ux-pro-max` (nextlevelbuilder) — 50+ styles, 161 paletas, 99 UX guidelines

### Auditorías técnicas hechas
- **Sitio original `mrfriasfoodtruck.com`**: identificados 3 errores reales (form roto, WhatsApp mal linkeado, dependencia de threeppanama.com)
- **Comparación visual template vs nuestro**: 5 diferencias detectadas y corregidas (background, mayúsculas, eyebrow plano, botón rojo, sin círculo punteado)

---

## ⚠️ Pendiente con bloqueos

### GitHub Actions auto-deploy
- **Estado**: workflow `.github/workflows/deploy.yml` listo, pero NO pusheado al repo
- **Bloqueo**: el token de `gh` CLI no tiene scope `workflow`
- **Fix**: el usuario debe correr `gh auth refresh -h github.com -s workflow` y autorizar
- **Workaround actual**: deploy manual con `wrangler pages deploy` desde local

### Sveltia CMS OAuth
- **Estado**: `/admin/index.html` + `/admin/config.yml` listos, deployados
- **Bloqueo**: OAuth proxy con `auth.sveltia.dev` (público) o un proxy propio en Cloudflare Pages Functions
- **Pendiente**: validar que el login con GitHub funciona en producción

### Token Cloudflare con IP whitelist
- **Estado**: el token se bloqueó dos veces por IP (200.108.56.112 → 252)
- **Fix temporal**: el usuario amplió la whitelist
- **Recomendación**: eliminar la restricción IP o usar GitHub Actions (corre en IPs de GitHub, sin restricción)

---

## ❌ Pendiente con cliente (Robert)

Lista completa en `FIGMA_HANDOFF_MR_FRIAS/08-secciones-pendientes.md`.

### Crítico (bloquea producción final)
1. Confirmar los 6 números WhatsApp definitivos
2. Validar horarios por sucursal (¿el mismo o varían?)
3. Direcciones exactas + Google Maps URL para schema.org
4. Reprocesar las 7 fotos del menú con IA (las actuales son WhatsApp comprimido)
5. Foto Open Graph 1200×630 (hoy apunta a un archivo inexistente)
6. Validar email institucional `pedido@mrfriasfoodtruck.com`

### Recomendable
7. Logo en SVG vectorial
8. Foto de fachada por cada sucursal
9. Decisión: ¿mostrar precios o solo enlazar a WhatsApp?
10. Set completo de favicons
11. Handles reales de Instagram / TikTok / Facebook

---

## 🎯 Decisiones tomadas durante el proceso

1. **Stack**: HTML estático generado por Node, sin runtime PHP en producción
2. **Hosting**: Cloudflare Pages en lugar de Vercel (token disponible)
3. **3 pages en Figma** en lugar de 6 (límite del plan Starter)
4. **Saqué los SVG flotantes inventados** del hero (cebolla, tomate, hojas) y restauré los del template (`bannerShape1_X.svg`)
5. **Saqué el círculo punteado rojo decorativo** alrededor de los thumbs de antojos (no está en el template)
6. **Cambié `brick-wall 2.jpg`** por el `bannerBG1_1.jpg` real del template demo (mejor look + piso de madera)
7. **Modal "Pedir por WhatsApp"** del header va a `#sucursales`, no a un WhatsApp directo (usuario elige)
8. **No agregar campos de form de contacto** porque el sitio original tenía form roto que el cliente no atendía
9. **Eliminé secciones del template**: Chefs (no aplica), Testimoniales (inventados), Blog (no aplica), Shop/Cart (no aplica)
10. **Sucursales con WhatsApp único por número** (el bug más grave del sitio original)

---

## 📊 Métricas

### Comparación con sitio original

| Métrica | Original (mrfriasfoodtruck.com) | Nuestro (mrfrias-demo.pages.dev) |
|---|---|---|
| Accessibility | 81 | **100** |
| Best Practices | 73 | **100** |
| SEO | 100 | **100** |
| Agentic Browsing | 50 | **100** |
| Audits fallados | 10 | **0** |
| Tiempo de carga | 7.36s | **5.8s** |
| WhatsApp por sucursal | 1 (Nuevo Arraiján para los 5) | **6** distintos |
| Schema.org Restaurant | 0 | **6** (uno por sucursal) |
| Form de contacto roto | Sí (JS error) | N/A (no hay form) |
| Dependencia servidor 3ros | Sí (threeppanama.com) | **No** (hosting propio) |

### Uso de quota Figma MCP
- **Plan**: Starter, seat View
- **Límite**: 6 tool calls/mes
- **Usadas en esta sesión**: 6 (1 create + 1 use_figma exitoso + 4 misc)
- **Próximo reset**: 2026-07-01

---

## 🛠️ Próximos pasos sugeridos

### Si querés iterar el código ahora
1. Activar GH Actions: `gh auth refresh -h github.com -s workflow`
2. Push `.github/workflows/deploy.yml`
3. A partir de ahí, `git push` → auto-deploy en 1 minuto

### Si querés iterar en Figma
1. Upgrade a Professional + Editor seat (USD 15/mes) para 200 calls/día
2. O esperar al reset del 2026-07-01

### Si querés mostrar a Robert
1. Validar los 6 pendientes críticos (números, horarios, fotos)
2. Mandarle el link `https://mrfrias-demo.pages.dev`
3. Pitch incluido en `FIGMA_HANDOFF_MR_FRIAS/00-resumen-proyecto.md`

### Si querés deploy a un dominio propio
1. Si Robert compra el rebuild, mover el DNS de `mrfriasfoodtruck.com` a Cloudflare
2. Conectar el dominio al proyecto Pages
3. Generar certificado SSL (automático con CF)

---

## 📝 Notas técnicas

### Build local
```bash
cd site/
node build.mjs              # genera index.html (~58 KB)
python3 -m http.server 8000 # sirve estático en localhost:8000
```

### Deploy manual a Cloudflare
```bash
CLOUDFLARE_API_TOKEN='cfat_...' \
CLOUDFLARE_ACCOUNT_ID='db6ec89fc99c875b7b448f573a9e559a' \
npx wrangler@latest pages deploy . \
  --project-name=mrfrias-demo \
  --commit-dirty=true \
  --branch=main
```

### Comparar visualmente con template original
```bash
cd reports/visual-compare/
# Ya hay scripts firecrawl que comparan ambos sitios
```

### Verificar Lighthouse desde CLI
```bash
npx lighthouse https://mrfrias-demo.pages.dev/ \
  --only-categories=accessibility,best-practices,seo \
  --output=html --output-path=./lh-report.html
```
