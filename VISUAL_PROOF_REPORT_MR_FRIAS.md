# VISUAL PROOF REPORT — MR. FRÍAS FOOD TRUCK
**Fecha**: 2026-06-02
**Entorno**: Cloud remoto `/home/user/mrfrias-web`

---

## 1. Herramientas usadas

- **Servidor local rebuild**: PHP built-in `php -S localhost:8765 -t .` → sirviendo `index.php` con el template completo
- **Playwright CLI**: `@playwright/test` + Chromium binario en `/opt/pw-browsers/chromium-1194/chrome-linux/chrome`
- **Script**: `scripts/visual-audit.mjs` — capturas full-page a 1440×900 y 390×844
- **Template original**: URL pública `https://www.ex-coders.com/php-template/fresheat/index-one-page.php` — captura desktop bloqueada por política de red del entorno cloud. El usuario proveyó el screenshot manualmente.

---

## 2. Screenshots generados

| Archivo | Método | Estado |
|---|---|---|
| `qa/screenshots/rebuild-desktop.png` | Playwright CLI, localhost:8765 | ✅ Generado y leído |
| `qa/screenshots/rebuild-mobile.png` | Playwright CLI, localhost:8765 | ✅ Generado y leído |
| `qa/screenshots/template-desktop.png` | URL pública bloqueada por allowlist | ❌ Solo "Host not in allowlist" |
| `qa/screenshots/template-mobile.png` | URL pública bloqueada por allowlist | ❌ Solo "Host not in allowlist" |

**Template original visto**: Screenshot de 399×13618px provisto directamente por el usuario en el chat. Leído visualmente. Confirmado.

---

## 3. Confirmación de lectura visual

**VI ESTOS ARCHIVOS:**
- `template-desktop.png` (screenshot del usuario, full-page 399×13618px) — leído en detalle
- `rebuild-desktop.png` (Playwright, 1440×900, full-page) — leído en detalle
- `rebuild-mobile.png` (Playwright, 390×844, full-page) — leído en detalle

**NO vi:**
- `template-mobile.png` — bloqueado por red del entorno cloud

---

## 4. Comparación visual real — sección por sección

---

### 4.1 HERO

#### Template original (visto)

La sección hero del template Fresheat en desktop tiene estas proporciones:
- Altura total: aprox. 600–650px en relación al resto de la página
- Columna izquierda: subtítulo pequeño, título en 2 líneas máximo, párrafo corto, 2 botones
- Columna derecha: foto del plato/comida de gran tamaño — ocupa visualmente el 50% del ancho y casi toda la altura del hero
- La **comida DOMINA** visualmente — es lo primero que capta la vista
- El fondo es oscuro (ladrillo/tierra), con shapes flotantes de ingredientes
- Hay equilibrio real entre texto y foto. La foto de la comida tiene presencia de plano principal.
- Los títulos son grandes pero no aplastantes. La comida no se siente chica.

#### Rebuild actual (visto)

- La frase "STREET FOOD PANAMEÑO PARA CUANDO EL ANTOJO NO PERDONA" ocupa **casi todo el ancho izquierdo** en tipografía muy grande
- En el screenshot de 1440px de ancho: **la foto de comida de la derecha NO ES VISIBLE** al nivel de detalle de la captura full-page — el texto domina tan agresivamente que la columna derecha se pierde
- El `min-height: 770px` hace el hero demasiado alto
- El título tiene 4 líneas visibles en el render, cada una muy grande
- En **mobile**: el texto toma literalmente todo el viewport visible above-the-fold. La comida no existe en mobile.
- El fondo brick es correcto. Las shapes SVG existen pero no se ven porque el texto las ahoga.
- Resultado visual: **pareciera un cartel de texto, no una landing de comida**

#### Diagnóstico

| | Template | Rebuild |
|---|---|---|
| Altura hero | ~600px equilibrada | 770px+ excesivo |
| Presencia texto | 30% peso visual | 70% peso visual |
| Presencia comida | 50% peso visual | ~15% peso visual |
| Foto comida en mobile | Visible (col aparte) | Invisible — oculta con `d-none` |
| Balance columnas | Equilibrado | Texto aplasta a foto |

**Problema de raíz**: `font-size` del título está demasiado grande. El `min-height: 770px` no tiene la foto que lo justifique. En mobile la foto está oculta (`d-none d-lg-block`) sin alternativa.

---

### 4.2 ANTOJOS / BEST FOOD ITEMS

#### Template original (visto)

- Fondo crema/cálido claro
- Cards individuales: cada card tiene la foto del plato **flotando encima** de la card con el efecto de `margin-top: -120px`
- Foto circular/recortada, grande, apetitosa, bien iluminada
- Debajo de la foto: nombre del plato, descripción corta, precio
- Las cards tienen gradiente blanco transparente → blanco sólido
- La sección completa tiene buen ritmo visual — las fotos son las protagonistas
- Shapes decorativos en las esquinas del contenedor

#### Rebuild actual (visto)

- La estructura es correcta — usa `single-food-items` del template
- Se ven 6–7 cards en el carrusel (demasiadas si incluye Deditos)
- Las fotos son las imágenes WhatsApp reales — visualmente comprimidas/oscuras
- El `circle-shape` decorativo está presente — correcto
- Botón "PÍDELO AHORA" al final de la sección — existe, es aceptable

#### Diagnóstico

| | Template | Rebuild |
|---|---|---|
| Estructura HTML | `.single-food-items` | ✅ Igual, correcto |
| Foto flotando | ✅ Sí | ✅ Sí |
| Calidad visual fotos | Alta (fotos del template) | Media-baja (WhatsApp comprimido) |
| "Deditos" visible | N/A | ⚠️ Aparece si no se filtra |
| Botón sección | 1 al pie | 1 al pie ✅ |

**Problema menor**: Las fotos WhatsApp son de calidad inferior pero son las reales del cliente. El filtro de `destacado: true` aún no está implementado.

---

### 4.3 OUR CHEFE → SUCURSALES ⚠️ CRÍTICO

#### Template original (visto)

Esta es la sección más importante para la comparación:

- Fondo oscuro con textura
- Cada **chefe-card style1** tiene esta anatomía precisa:
  - **FOTO GRANDE** del chef posicionada en `absolute top: -180px` — flota sobre la card, tamaño 310×297px
  - El chef se ve de cintura arriba, sobre fondo transparente, con mucha presencia
  - **Debajo de la foto**: la card blanca con `border-radius: 100px 100px 0 0` — la curva pronunciada en la parte superior es el elemento visual clave. La card "abraza" la foto desde abajo.
  - En el bloque blanco: nombre, especialidad, iconos de redes sociales
  - Hay `margin-top: 215px` para dar espacio a la foto flotante
  - Las cards tienen `padding: 125px 88px 33px` — muy generoso, muy respirado
  - La sección completa da una sensación de **elegancia editorial**

- Total: 6 chefs en grid de 3×2 — idéntico a nuestras 6 sucursales

#### Rebuild actual (visto)

Lo que veo en el rebuild:
- Las cards tienen un **círculo rojo** en la parte superior con el ícono de location pin
- El círculo fue creado con un SVG custom (`mrfrias-sucursal-silueta`) que tiene forma de arco
- El resultado visual es: **un círculo rojo con el ícono, sobre una caja blanca rectangular**
- La caja blanca NO tiene el `border-radius: 100px 100px 0 0` del template
- La sensación es de **tarjeta genérica con badge rojo encima** — no de card premium
- El `chefe-content` con el nombre y el botón están bien posicionados
- Pero el conjunto no evoca la elegancia del template original

#### Diagnóstico visual directo

El error fundamental de la sección sucursales:
La tarjeta del template es blanca con curva pronunciada en la parte SUPERIOR y una foto GRANDE flotando encima.
La tarjeta del rebuild tiene un círculo rojo en la parte superior y el resto del cuerpo es rectangular.
Son formas opuestas: uno usa la curva como elemento, el otro usa un círculo.

| | Template chefe-card | Rebuild sucursal-card |
|---|---|---|
| Elemento superior | Foto chef 310×297px flotando | Círculo SVG custom rojo con ícono |
| Forma card | `border-radius: 100px 100px 0 0` blanca | Caja rectangular (no respeta el radius del template) |
| Padding interior | 125px top, 88px laterales | Reducido |
| Sensación | Elegante, premium, editorial | Genérica, de aplicación |
| Fondo sección | Oscuro con textura | ✅ Oscuro (brick) correcto |

**Conclusión**: La sección sucursales necesita volver a usar el `.chefe-card.style1` del template, eliminando el SVG custom, y reemplazando la foto del chef por un bloque coloreado con el ícono de ubicación del mismo tamaño (310×297px).

---

### 4.4 TESTIMONIALS → ACERCA DE NOSOTROS

#### Template original (visto)

- Sección de fondo oscuro (gris oscuro / negro)
- **Columna izquierda**: Imagen rectangular GRANDE (~45% del ancho), con overlay sutil. La imagen tiene peso visual fuerte. En el template es un video/imagen de comida/ambiente del restaurante.
- **Columna derecha**: Quote, nombre del cliente, cargo, estrellas
- Shapes decorativos en esquinas
- La sección respira — hay padding generoso
- El contraste texto claro sobre fondo oscuro es efectivo
- Se siente como una sección "de peso", de credibilidad

#### Rebuild actual (visto)

- Dos columnas: foto izquierda (`about-mesa-gente.jpg`), texto derecho
- El fondo de la sección parece **claro o crema** (no oscuro)
- La foto está visible y es de buena composición (mesa con amigos)
- El texto de los 3 párrafos es largo pero correcto
- Hay un botón "PEDIR AHORA" al final que no debería estar
- El Marquee rotante debajo (`HIPAPAS · HOT DOGS ·`) interrumpe la sección
- La sección se siente **más ligera** visualmente que el template — no tiene el peso editorial del Testimonials original

#### Diagnóstico

| | Template testimonial | Rebuild about |
|---|---|---|
| Fondo | Oscuro, impactante | Claro/crema, más liviano |
| Foto | Grande, 45% ancho | Media, presente |
| Peso visual | Alto — sección de credibilidad | Medio — sección informativa |
| Botón | ❌ No tiene | ⚠️ Tiene "PEDIR AHORA" — eliminar |
| Shapes decorativos | Sí (`testimonialShape`) | No visibles en rebuild |

---

### 4.5 TODAY SPECIAL FOOD / OFFER

#### Template original (visto)

Vi al menos dos bloques de este tipo en el template:

**Bloque 1 ("Today Special Food")**:
- Fondo muy oscuro con glow naranja/cálido
- Plato de comida grande en el centro-derecha, iluminado, flotando
- Texto izquierda: subtítulo pequeño, título grande, countdown timer
- El timer tiene elementos de días/horas/minutos
- Sensación: dramática, oscura, apetitosa
- La comida flota visualmente sobre el fondo oscuro con efecto de luz

**Bloque 2 ("Get 30% Discount")**:
- Similar mood, hamburguesa grande
- Texto de oferta/descuento (que no usaremos)
- La composición es lo que nos interesa: comida a la derecha, texto a la izquierda, fondo oscuro

#### Rebuild actual (visto)

- El rebuild tiene una sección CTA final con `cta-hotdogs-neon.png` (hot dogs con efecto neon/glow)
- La imagen sí tiene ese efecto luminoso cálido
- La sección usa `mrfrias-cta-brick` como fondo
- El texto tiene "EL ANTOJO NO ESPERA" + título + párrafo + botón
- Es lo más parecido al offer del template que tiene el rebuild
- El bloque **"Today Special"** como sección separada (bloque de respiro puro, sin botón) NO EXISTE en el rebuild actual

#### Diagnóstico

| | Template offer | Rebuild CTA |
|---|---|---|
| Bloque tipo "respiro" puro | Sí — dos bloques | No — solo CTA con botón |
| Glow/iluminación comida | ✅ Sí, dramático | ✅ Sí (`cta-hotdogs-neon.png`) |
| Fondo oscuro | ✅ Muy oscuro | ✅ Brick oscuro |
| Countdown | Sí (no usaremos) | No |
| Botón | Sí (no usaremos en respiro) | Sí |

---

### 4.6 NEWS/BLOG → "MIRA LO QUE TE ESPERA"

#### Template original (visto)

- Sección de cards de blog/noticias
- Cada card: imagen superior grande, fecha, categoría, título, extracto, "Read More"
- Grid de 3 columnas en desktop
- Fondo claro/blanco
- Las imágenes de las cards son de comida — buen aspecto

#### Rebuild actual (visto)

- La galería usa un **Swiper slider** (no grid de cards)
- Las fotos llenan las cards completamente — sin texto de blog
- Hay un overlay WhatsApp en hover
- El fondo es brick/oscuro (`mrfrias-gallery-brick`)
- Visualmente se siente más como galería de Instagram que como blog
- La sección ya está bien adaptada — no parece blog

#### Diagnóstico

El rebuild ya resolvió esta adaptación correctamente. Las fotos de platos reales en slider es mejor que cards de blog para este cliente.

| | Template blog | Rebuild galería |
|---|---|---|
| Estructura | Cards con texto | Slider de fotos puras |
| Fondo | Claro | ✅ Oscuro brick — mejor para dark food |
| Elementos blog | Fecha, autor, read more | ❌ Eliminados — correcto |
| Overlay acción | Link a post | ✅ WhatsApp |

---

### 4.7 FOOTER

#### Template original (visto)

- Fondo oscuro
- Multi-columna: logo + descripción, links rápidos, contacto, newsletter
- Shapes decorativos flotantes
- Logo bien posicionado
- Links de texto, no botones gigantes
- Separador / copyright al pie

#### Rebuild actual (visto)

- 3 columnas: Logo + tagline / Sucursales / Horario+Contacto
- Fondo oscuro — correcto
- Lista de sucursales con WhatsApp — funcional y limpio
- No hay formulario en el footer — correcto
- Los shapes del template (`footerShape1_1.png` etc.) no son visibles

#### Diagnóstico

El footer del rebuild está bien estructurado. Le faltan los shapes decorativos del template.

---

### 4.8 MOBILE

#### Template original mobile (NO Visto directamente)

No tengo captura del template en mobile. Solo referencia de código y del desktop.

#### Rebuild mobile (visto)

Problemas críticos en mobile:
1. **HERO**: El título "STREET FOOD PANAMEÑO PARA CUANDO EL ANTOJO NO PERDONA" ocupa aprox. el 70% del viewport en mobile. La foto de comida está oculta con `d-none` para mobile — no hay imagen de comida en el hero en móvil. Solo texto enorme.
2. **SUCURSALES**: Las cards se ven como cajas blancas con el círculo rojo arriba — apiladas en columna única. Funciona estructuralmente pero no respira.
3. **ABOUT**: Columna única, la foto y el texto se ven bien apilados.
4. **FORMULARIO**: Visible y pesado en mobile — ocupa mucho espacio con campos blancos.

---

## 5. Tabla de decisión por sección

| # | Sección | Referencia template | Acción | Riesgo | Aprobación |
|---|---|---|---|---|---|
| 1 | **Hero** | `banner-wrapper.style1` | **Corregir proporciones**: reducir `min-height`, bajar `font-size` del título, fijar tamaño de foto | Alto | SÍ |
| 2 | **Antojos** | `single-food-items` | **Filtrar `destacado: false`** (Deditos). Estructura correcta, mínimo cambio | Bajo | NO |
| 3 | **Sucursales** | `chefe-card.style1` | **Reconstruir interior de card**: eliminar SVG custom, volver al `chefe-thumb` del template con bloque de color + ícono location | Alto | SÍ |
| 4 | **About** | `testimonial-wrapper.style1` | **Oscurecer fondo**, agregar `testimonialShape`, eliminar botón "PEDIR AHORA", mantener contenido | Medio | SÍ |
| 5 | **Bloque respiro 1** | `offer-section` + `offerBG1_1.jpg` | **Crear sección nueva** (no existe en rebuild): bloque de branding con foto flotante, copy aprobado, sin botón | Bajo | SÍ (copy) |
| 6 | **Galería** | `gallery-section` (ya adaptado) | **Mantener** — está bien. Posible: agregar 1-2 fotos de `nuevas/` | Bajo | NO |
| 7 | **Horario** | N/A — eliminar | **Eliminar sección** `#horario`. Ya está en footer | Bajo | SÍ |
| 8 | **CTA Final** | `cta-section.style1` | **Mantener** — `cta-hotdogs-neon.png` funciona bien. Revisar copy | Bajo | NO |
| 9 | **Contacto/Form** | N/A — eliminar | **Eliminar completo**: formulario + caja info. Todo ya está en footer | Bajo | SÍ |
| 10 | **Footer** | Footer template | **Agregar shapes** (`footerShape1_1-4.png`). Resto está bien | Mínimo | NO |

---

## 6. Secciones que recomiendo tomar del template

1. **Proporciones del hero** — la lógica visual de equilibrio texto/comida 50/50
2. **chefe-card.style1 completa** — border-radius, padding, chefe-thumb absoluto — reutilizar sin inventar nada nuevo
3. **testimonial-wrapper.style1** — el fondo oscuro + composición imagen-izquierda para About
4. **offer-section** — para el bloque de respiro visual que falta

---

## 7. Secciones que recomiendo conservar del rebuild

1. **Antojos** — estructura correcta, solo filtrar Deditos
2. **Galería** — ya bien adaptada como slider de platos
3. **CTA Final** — el `cta-hotdogs-neon.png` con glow funciona
4. **Footer** — 3 columnas funcionales, solo agregar shapes
5. **Header** — correcto (logo blanco, topbar rojo, nav oscuro, CTA amarillo)
6. **Botón flotante WhatsApp** — correcto y necesario

---

## 8. Secciones que recomiendo eliminar o mover al footer

| Sección eliminada | Destino del contenido |
|---|---|
| `#horario` (sección propia) | Footer columna "Horario" — ya está ahí |
| `#contacto` + formulario completo | Footer columna "Contacto" — emails y redes ya están |
| Botón "PEDIR AHORA" en About | Eliminado — no va a ningún lado |

---

## 9. Dudas pendientes antes de implementar

1. **Sucursales — parte superior de la card**: ¿Bloque de color sólido (rojo `#C31329`) con ícono location-dot blanco grande centrado, o bloque naranja `#EE6733`? Necesito color aprobado para el "chefe-thumb" adaptado.

2. **Hero — ¿cuántos botones?**: El brief dice "Pedir por WhatsApp" + "Ver sucursales". El actual solo tiene 1. ¿Agrego el segundo o queda 1 solo?

3. **About — ¿qué fondo?**: ¿Oscuro como el template testimonials (`#1E1713`) o mantener el actual más claro? Impacta toda la sección.

4. **Bloque respiro "Today Special" — copy**: Elegir uno de:
   - A) "Un antojo que no falla"
   - B) "Sabor que resuelve"
   - C) "Street food que sí llena"

5. **Mobile hero sin foto**: En mobile la foto está oculta (`d-none d-lg-block`). ¿Agrego una imagen de fondo específica para mobile en el hero, o el texto reducido es suficiente?

---

## 10. Conclusión ejecutiva

**Qué secciones del template original se ven claramente mejor:**
- Las chefe-cards en sucursales — son significativamente más elegantes que la versión actual
- La sección testimonials como base para About — el fondo oscuro y la imagen grande dan más peso editorial
- Las proporciones del hero — comida protagonista, no texto protagonista

**Qué secciones del rebuild están bien y se conservan:**
- Galería (ya bien adaptada)
- CTA Final (buen uso de la foto neon)
- Footer (funcional y limpio)
- Header (correcto)

**Qué secciones deben eliminarse:**
- Formulario de contacto completo
- Sección de horario como sección propia

**Cambios de mayor impacto visual:**
1. Hero: bajar font-size, reducir min-height, dar protagonismo a la foto de comida
2. Sucursales: eliminar SVG custom, volver a chefe-card.style1 real del template
3. About: oscurecer fondo, eliminar botón, agregar shapes del template

---

## 11. Frase de seguridad

No ejecutaré cambios hasta recibir la frase: **APROBADO PARA IMPLEMENTAR.**
