# Mr. Frías Food Truck — Sitio web

Rebuild del sitio de Mr. Frías Food Truck usando template Fresheat (Envato) + Cloudflare Pages.

## Estado actual

| Pieza | Estado | URL / Path |
|---|---|---|
| Demo en producción | ✅ Live | https://mrfrias-demo.pages.dev |
| Repo código | ✅ Activo | https://github.com/kmediafilms-lgtm/mrfrias-web |
| Figma design system | ✅ Creado (3 pages) | https://www.figma.com/design/am7dUISl1eZhcv36p3CiNp |
| Handoff Figma docs | ✅ 10 docs + 24 assets clasificados | `/FIGMA_HANDOFF_MR_FRIAS/` |
| Sveltia CMS panel | ⚠️ HTML + config listos, falta OAuth GitHub | `/admin/` |
| GitHub Actions auto-deploy | ⚠️ Workflow listo en `/tmp/`, pendiente push (necesita scope `workflow`) | `.github/workflows/deploy.yml` |
| Sitio original auditoría | ✅ Completa | `/reports/AUDITORIA.md` |
| Comparación visual (firecrawl) | ✅ Capturas template vs nuestro | `/reports/visual-compare/` |

## Stack

- **Build**: Node 25 + `build.mjs` (template literal → index.html estático)
- **Frontend**: Template Fresheat (PHP convertido a HTML estático) + CSS override en `mrfrias.css`
- **Backend**: ninguno — sitio 100% estático
- **Hosting**: Cloudflare Pages (proyecto `mrfrias-demo`)
- **Forms**: WhatsApp directo por sucursal (sin form de contacto interno)
- **Content**: `/content/*.json` (editable manualmente o vía CMS)
- **Imágenes**: `/assets/img/mrfrias/` + `/assets/img/mrfrias/nuevas/`

## Estructura del repo

```
site/
├── index.php                    # Versión PHP (no se sirve, fuente para futuras edits)
├── build.mjs                    # Renderer Node → index.html
├── config.php                   # Loader de content JSON para PHP
├── content/
│   ├── site.json                # Textos del sitio (hero, about, horario, contacto, footer)
│   ├── sucursales.json          # 6 sucursales con WhatsApp por número
│   └── menu.json                # 7 antojos
├── assets/
│   ├── css/
│   │   ├── main.css             # Template Fresheat original
│   │   └── mrfrias.css          # Overrides Mr. Frías
│   ├── img/
│   │   ├── mrfrias/             # Logo + fotos editadas (nuevas/)
│   │   ├── bg/                  # Backgrounds del template
│   │   ├── shape/               # SVG shapes flotantes
│   │   └── icon/                # SVG iconos
│   └── js/                      # jQuery + Swiper + Wow.js del template
├── partials/                    # PHP partials (head, header, footer, etc.)
├── admin/                       # Sveltia CMS panel
│   ├── index.html
│   └── config.yml               # Esquema para los 3 JSON + carpeta imágenes
├── robots.txt
├── sitemap.xml
├── llms.txt                     # Para que IAs entiendan el negocio
├── .gitignore
├── README.md                    # Este archivo
└── STATUS.md                    # Progreso y decisiones
```

## Cómo editar contenido

### Opción A — Sin panel CMS (terminal)
1. Editás los archivos `content/*.json` con cualquier editor
2. Para imágenes: arrastrás a `assets/img/mrfrias/nuevas/`
3. Build + deploy:
   ```bash
   node build.mjs
   CLOUDFLARE_API_TOKEN=... CLOUDFLARE_ACCOUNT_ID=... \
     npx wrangler pages deploy . --project-name=mrfrias-demo --branch=main
   ```

### Opción B — Con Sveltia CMS (cuando esté OAuth)
1. Vas a https://mrfrias-demo.pages.dev/admin/
2. Login with GitHub → autorizás el repo
3. Editás desde el panel web
4. Save → commit automático → GH Actions deploya

## Lighthouse en producción

- Accessibility: **100**
- Best Practices: **100**
- SEO: **100**
- Agentic Browsing: **100**

(0 audits fallados, 55 audits pasados)

## Lo que NO contiene

- Sistema de pedidos online / carrito
- Pagos online
- Login / cuenta de usuario
- Backend de gestión
- Delivery propio (usan PedidosYa)
- Blog
- Sección de chefs
- Testimoniales / reseñas inventadas
- Precios inventados
- Promociones inventadas

## Pendientes críticos antes de mostrar a Robert

Listados en detalle en `FIGMA_HANDOFF_MR_FRIAS/08-secciones-pendientes.md`. Resumen:

1. Validar los 6 números WhatsApp definitivos
2. Confirmar si el horario aplica a todas las sucursales
3. Direcciones exactas + Google Maps URL por sucursal
4. Reprocesar las 7 fotos del menú con IA
5. Logo en SVG vectorial
6. Foto Open Graph 1200×630 (hoy apunta a un archivo inexistente)

## Próximo paso

1. **Vos**: validar diseño en Figma + decidir si va por código directo o esperar a Robert
2. **Yo**: completar GH Actions workflow (necesita `gh auth refresh -h github.com -s workflow`)
3. **Yo**: completar OAuth de Sveltia CMS

## Créditos

- Template: [Fresheat](https://www.ex-coders.com/php-template/fresheat/) by Pixel Plus (Envato Elements)
- Build: k.mediafilms
- Cliente: Robert Frías
