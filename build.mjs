/**
 * Build estático: lee /content/*.json y renderea /index.html
 * Usa los COMPONENTES REALES del template Fresheat (Envato):
 *   - banner-section (swiper slider con shapes animados + tilt)
 *   - best-food-items-section (swiper horizontal de cards)
 *   - about-us-section (con shapes y wow animations)
 *   - popular-dishes-section (grid de cards con thumb)
 *   - cta-section (imagen + texto + botón)
 *   - food-menu-section (tabs por categoría — sin precios)
 *   - gallery-section (swiper slider)
 *   - SUCURSALES section (custom Mr. Frías con WhatsApp por sucursal)
 */
import fs from 'node:fs';
import path from 'node:path';

const root = path.dirname(new URL(import.meta.url).pathname);
const SITE = JSON.parse(fs.readFileSync(path.join(root, 'content/site.json'), 'utf8'));
const SUCURSALES = JSON.parse(fs.readFileSync(path.join(root, 'content/sucursales.json'), 'utf8')).sucursales;
const MENU = JSON.parse(fs.readFileSync(path.join(root, 'content/menu.json'), 'utf8')).categorias;

const h = (s) => String(s ?? '').replace(/[&<>"']/g, (c) => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const waLink = (e164, msg) => e164 ? `https://wa.me/${encodeURIComponent(e164)}?text=${encodeURIComponent(msg)}` : '#sucursales';
const activas = SUCURSALES.filter(s => s.estado === 'activo');
const telMain = activas.length ? activas[0].telefono_visible : '6571-6825';
const telMainHref = telMain.replace(/-/g, '');
const waMain = activas.length ? waLink(activas[0].whatsapp_e164, SITE.whatsapp_messages.general) : '#sucursales';

// Slides del banner — 3 fotos transparentes nuevas (con alpha real) sobre fondo brick
const heroSlides = [
  {
    sub: 'EL SPOT DE LOS ANTOJOS',
    title: 'Hamburguesas con flow',
    text: 'Carne sellada, pan suave, antojo resuelto en cada mordida.',
    img: 'nuevas/hero-burger-exploded.png'
  },
  {
    sub: 'STREET FOOD PANAMEÑO',
    title: 'Hot dogs de calle',
    text: 'Con flow de food truck. Salsas, toppings y carácter.',
    img: 'nuevas/hotdog-side 1.png'
  },
  {
    sub: 'CUANDO EL ANTOJO PEGA',
    title: 'Burger del antojo',
    text: 'Cargadas, sabrosas, imposibles de soltar. El antojo no perdona.',
    img: 'nuevas/hero-burger-vertical.png'
  }
];

// Galería: 8 imágenes para el slider
const galleryImgs = [
  'whatsapp_image_2023-10-11_at_12_34_21_am.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_21_am_1.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_21_am_2.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_23_am.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_24_am.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_25_am.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_26_am.800x725.jpeg',
  'whatsapp_image_2023-10-11_at_12_34_24_am_1.800x725.jpeg',
];

const html = `<!DOCTYPE html>
<html lang="${h(SITE.seo.lang)}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>${h(SITE.seo.title)}</title>
  <meta name="description" content="${h(SITE.seo.description)}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="${h(SITE.seo.title)}">
  <meta property="og:description" content="${h(SITE.seo.description)}">
  <meta property="og:image" content="${h(SITE.seo.og_image)}">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="shortcut icon" href="assets/img/mrfrias/logo.png">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/meanmenu.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/mrfrias.css?v=${Date.now()}">
</head>
<body class="mrfrias-body">

<!-- Preloader Start -->
<div id="preloader" class="preloader">
  <div class="animation-preloader">
    <div class="spinner"></div>
    <div class="txt-loading">
      <span data-text-preloader="M" class="letters-loading">M</span>
      <span data-text-preloader="R" class="letters-loading">R</span>
      <span data-text-preloader="." class="letters-loading">.</span>
      <span data-text-preloader="F" class="letters-loading">F</span>
      <span data-text-preloader="R" class="letters-loading">R</span>
      <span data-text-preloader="I" class="letters-loading">I</span>
      <span data-text-preloader="A" class="letters-loading">A</span>
      <span data-text-preloader="S" class="letters-loading">S</span>
    </div>
    <p class="text-center">Cargando...</p>
  </div>
  <div class="loader">
    <div class="row">
      <div class="col-3 loader-section section-left"><div class="bg"></div></div>
      <div class="col-3 loader-section section-left"><div class="bg"></div></div>
      <div class="col-3 loader-section section-right"><div class="bg"></div></div>
      <div class="col-3 loader-section section-right"><div class="bg"></div></div>
    </div>
  </div>
</div>

<!-- Back To Top Start -->
<button id="back-top" class="back-to-top">
  <i class="fa-regular fa-arrow-up"></i>
</button>

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- Offcanvas Area Start -->
<div class="fix-area">
  <div class="offcanvas__info">
    <div class="offcanvas__wrapper">
      <div class="offcanvas__content">
        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
          <div class="offcanvas__logo">
            <a href="#home">
              <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck logo" style="max-height: 60px;">
            </a>
          </div>
          <div class="offcanvas__close">
            <button><i class="fas fa-times"></i></button>
          </div>
        </div>
        <p class="text d-none d-lg-block">
          ${h(SITE.brand.tagline_largo)}
        </p>
        <div class="offcanvas-gallery-area d-none d-xl-block">
          <div class="offcanvas-gallery-items">
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am_1.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am_1.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am_2.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_21_am_2.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
          </div>
          <div class="offcanvas-gallery-items">
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_23_am.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_23_am.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_24_am.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_24_am.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
            <a href="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_25_am.800x725.jpeg" class="offcanvas-image img-popup">
              <img src="assets/img/mrfrias/whatsapp_image_2023-10-11_at_12_34_25_am.800x725.jpeg" alt="Antojo Mr. Frías">
            </a>
          </div>
        </div>
        <div class="mobile-menu fix mb-3"></div>
        <div class="offcanvas__contact">
          <h4>Contacto</h4>
          <ul>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon">
                <i class="fal fa-map-marker-alt"></i>
              </div>
              <div class="offcanvas__contact-text">
                <a target="_blank" href="#sucursales">Panamá Oeste & Ciudad de Panamá</a>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon mr-15">
                <i class="fal fa-envelope"></i>
              </div>
              <div class="offcanvas__contact-text">
                <a href="mailto:${h(SITE.contacto.emails[0])}">
                  <span>${h(SITE.contacto.emails[0])}</span>
                </a>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon mr-15">
                <i class="fal fa-clock"></i>
              </div>
              <div class="offcanvas__contact-text">
                <span>
                  ${h(SITE.horario.lineas[0])}<br>
                  ${h(SITE.horario.lineas[1])}
                </span>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <div class="offcanvas__contact-icon mr-15">
                <i class="far fa-phone"></i>
              </div>
              <div class="offcanvas__contact-text">
                <a href="tel:${telMainHref}">+507 ${h(telMain)}</a>
              </div>
            </li>
          </ul>
          <div class="header-button mt-4">
            <a href="${h(waMain)}" target="_blank" rel="noopener" class="theme-btn">
              <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                <span class="button-icon"><i class="fab fa-whatsapp bg-transparent text-white me-2" style="font-size: 1.2rem;"></i></span>
                <span class="button-text">PEDIR AHORA</span>
              </span>
            </a>
          </div>
          <div class="social-icon d-flex align-items-center">
            ${SITE.contacto.redes.instagram ? `<a href="${h(SITE.contacto.redes.instagram)}" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>` : ''}
            ${SITE.contacto.redes.facebook ? `<a href="${h(SITE.contacto.redes.facebook)}" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>` : ''}
            ${SITE.contacto.redes.tiktok ? `<a href="${h(SITE.contacto.redes.tiktok)}" target="_blank" rel="noopener"><i class="fab fa-tiktok"></i></a>` : ''}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- HEADER — estructura REAL Fresheat: topbar rojo + logo en cuadrado blanco + nav azul -->
<header class="header-section header-1">
  <div class="black-bg"></div>
  <div class="red-bg"></div>
  <div class="container-fluid">
    <div class="main-header-wrapper">
      <div class="logo-image">
        <a href="#home">
          <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck">
        </a>
      </div>
      <div class="main-header-items">
        <div class="header-top-wrapper">
          <span><i class="fa-regular fa-clock"></i> ${h(SITE.horario.lineas[0])}</span>
          <div class="social-icon mrfrias-topbar-wa d-flex align-items-center">
            <span class="me-2">Pedidos:</span>
            ${activas.slice(0, 3).map(s => `<a href="${waLink(s.whatsapp_e164, s.mensaje_prellenado)}" target="_blank" rel="noopener" title="${h(s.nombre)} ${h(s.telefono_visible)}" aria-label="WhatsApp ${h(s.nombre)}"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>`).join('')}
          </div>
        </div>
        <div id="header-sticky" class="header-1">
          <div class="mega-menu-wrapper">
            <div class="header-main">
              <div class="logo">
                <a href="#home" class="header-logo">
                  <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck">
                </a>
              </div>
              <div class="header-left">
                <div class="mean__menu-wrapper">
                  <div class="main-menu">
                    <nav id="mobile-menu">
                      <ul>
                        ${SITE.nav.map(n => `<li><a href="${h(n.anchor)}">${h(n.label)}</a></li>`).join('')}
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <div class="header-right d-flex justify-content-end align-items-center">
                <a class="theme-btn" href="#sucursales">${h(SITE.cta_header.label)} <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                <div class="header__hamburger d-xl-none my-auto ms-3">
                  <div class="sidebar__toggle"><i class="fas fa-bars"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<main>

<!-- BANNER SECTION — fondo brick wall + 3 fotos transparentes, sin overlays ni adornos inventados -->
<section id="home" class="banner-section fix mrfrias-banner-brick">
  <div class="slider-area">
    <div class="swiper banner-slider">
      <div class="swiper-wrapper">
        ${heroSlides.map((slide, i) => `
          <div class="swiper-slide">
            <div class="banner-wrapper style1 bg-img mrfrias-banner-slide">
              <!-- Shapes flotantes REALES del template Fresheat -->
              <div class="shape1_1 d-none d-xxl-block" data-animation="slideInLeft" data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape1_1.svg" alt="shape"></div>
              <div class="shape1_2 d-none d-xxl-block" data-animation="slideInLeft" data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape1_2.svg" alt="shape"></div>
              <div class="shape1_3 d-none d-xxl-block" data-animation="slideInLeft" data-duration="3s" data-delay="2s"><img src="assets/img/shape/bannerShape1_3.svg" alt="shape"></div>
              <div class="shape1_4 d-none d-xxl-block" data-animation="slideInLeft" data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape1_4.svg" alt="shape"></div>
              <div class="shape1_5 d-none d-xxl-block" data-animation="slideInLeft" data-duration="2s" data-delay=".3s"><img src="assets/img/shape/bannerShape1_5.svg" alt="shape"></div>
              <div class="shape1_6 d-none d-xxl-block cir36"><img src="assets/img/shape/bannerShape1_6.svg" alt="shape"></div>
              <div class="banner-container">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                      <div class="banner-title-area">
                        <div class="banner-style1">
                          <div class="section-title">
                            <span class="sub-title mrfrias-banner-sub" data-animation="slideInRight" data-duration="2s" data-delay=".3s">${h(slide.sub)}</span>
                            ${i === 0
                              ? `<h1 class="title mrfrias-banner-title" data-animation="slideInRight" data-duration="2s" data-delay=".5s">${h(SITE.hero.h1)}</h1>`
                              : `<h2 class="title mrfrias-banner-title" data-animation="slideInRight" data-duration="2s" data-delay=".5s">${h(slide.title)}</h2>`}
                            <p class="mrfrias-banner-text" data-animation="slideInRight" data-duration="2s" data-delay=".6s">${h(slide.text)}</p>
                            <div class="mrfrias-hero-btns">
                              <a class="theme-btn" href="#sucursales" data-animation="slideInRight" data-duration="2s" data-delay=".7s">${h(SITE.hero.cta_primary.label)} <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                              <a class="theme-btn mrfrias-btn-outline d-none d-lg-inline-flex" href="#sucursales" data-animation="slideInRight" data-duration="2s" data-delay=".8s">Ver sucursales <i class="fa-sharp fa-regular fa-location-dot"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2">
                      <div class="banner-thumb-area is-transparent" data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                        <img src="assets/img/mrfrias/${h(slide.img)}" alt="${h(slide.title)}" class="mrfrias-banner-img">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `).join('')}
      </div>
      <div class="arrow-prev mrfrias-arrow"><i class="fa-regular fa-chevron-left"></i></div>
      <div class="arrow-next mrfrias-arrow"><i class="fa-regular fa-chevron-right"></i></div>
      <div class="pagination-class swiper-pagination"></div>
    </div>
  </div>
</section>

<!-- BEST FOOD ITEMS (Antojos) — ESTRUCTURA REAL Fresheat: swiper horizontal + circleShape giratorio + shapes a AMBOS lados -->
<section id="antojos" class="best-food-items-section fix section-padding bg-color2">
  <div class="best-food-wrapper">
    <div class="shape1 float-bob-y d-none d-xxl-block"><img src="assets/img/shape/bestFoodItemsShape1_1.png" alt="shape"></div>
    <div class="shape2 float-bob-x d-none d-xxl-block"><img src="assets/img/shape/bestFoodItemsShape1_2.png" alt="shape"></div>
    <div class="mrfrias-shape-right d-none d-xxl-block"><img src="assets/img/shape/bestFoodItemsShape1_1.png" alt="shape"></div>
    <div class="mrfrias-shape-left d-none d-xxl-block"><img src="assets/img/shape/bestFoodItemsShape1_2.png" alt="shape"></div>
    <div class="container">
      <div class="title-area">
        <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s">
          <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Best Food <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
        </div>
        <h2 class="title wow fadeInUp" data-wow-delay="0.7s">
          ${h(SITE.especialidades.title)}
        </h2>
        <p class="wow fadeInUp mrfrias-section-sub" data-wow-delay="0.8s">${h(SITE.especialidades.subtitle)}</p>
      </div>
      <div class="slider-area mb-n40">
        <div class="swiper bestFoodItems-slider">
          <div class="swiper-wrapper">
            ${MENU.filter(item => item.destacado !== false).map((item, i) => `
              <div class="swiper-slide">
                <div class="single-food-items">
                  <div class="item-thumb">
                    <img src="assets/img/mrfrias/${h(item.imagen_base)}.800x725.jpeg" alt="${h(item.nombre)}">
                  </div>
                  <div class="item-content">
                    <a href="#sucursales">
                      <h3>${h(item.nombre)}</h3>
                    </a>
                    <div class="text">${h(item.descripcion)}</div>
                  </div>
                </div>
              </div>
            `).join('')}
          </div>
        </div>
        <div class="bestFoodItems-pagination"></div>
      </div>
      <div class="btn-wrapper text-center wow fadeInUp mt-5" data-wow-delay="0.9s">
        <a class="theme-btn mrfrias-btn-red" href="#sucursales">PÍDELO AHORA <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- SUCURSALES — ESTRUCTURA chefe-section del template + fondo ladrillo -->
<section id="sucursales" class="chefe-section fix section-padding mrfrias-sucursales-brick">
  <div class="chefe-wrapper style1">
    <div class="container">
      <div class="title-area">
        <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s">
          <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Sucursales <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
        </div>
        <h2 class="title wow fadeInUp text-white" data-wow-delay="0.7s">
          ${h(SITE.sucursales_section.title)}
        </h2>
        <p class="wow fadeInUp mrfrias-section-sub mrfrias-sub-light" data-wow-delay="0.8s">${h(SITE.sucursales_section.subtitle)}</p>
      </div>
      <div class="chefe-card-wrap style1 pb-5">
        <div class="row g-4 justify-content-center">
          ${SUCURSALES.map((s, i) => `
            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.${2 + (i % 5)}s">
              <div class="chefe-card style1">
                <div class="chefe-thumb">
                  <div class="mrfrias-location-thumb">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                  </div>
                </div>
                <div class="chefe-content">
                  <h3>${h(s.nombre)}</h3>
                  <p class="mrfrias-sucursal-meta">${h(s.zona)} &nbsp;·&nbsp; <i class="fab fa-whatsapp"></i> ${h(s.telefono_visible)}</p>
                  <a class="theme-btn mrfrias-sucursal-wa-btn" href="${waLink(s.whatsapp_e164, s.mensaje_prellenado)}" target="_blank" rel="noopener">
                    Haz tu pedido aquí <i class="fa-sharp fa-regular fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          `).join('')}
        </div>
      </div>
      <p class="text-center mt-5 mrfrias-microcopy mrfrias-sub-light">${h(SITE.sucursales_section.microcopy)}</p>
    </div>
  </div>
</section>

<!-- ACERCA DE NOSOTROS — Layout 2 col foto rectangular + texto con bold -->
<section id="nosotros" class="mrfrias-acerca-section">
  <img src="assets/img/shape/testimonialShape1_1.png" alt="" class="mrfrias-about-shape1" aria-hidden="true">
  <div class="container" style="position:relative;z-index:2;">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
        <img src="assets/img/mrfrias/nuevas/about-mesa-gente.jpg" alt="Mesa Mr. Frías con amigos compartiendo comida" class="mrfrias-acerca-img">
      </div>
      <div class="col-lg-6">
        <h2 class="mrfrias-acerca-title wow fadeInUp" data-wow-delay="0.5s">ACERCA DE NOSOTROS</h2>
        <div class="mrfrias-acerca-body wow fadeInUp" data-wow-delay="0.7s">
          ${SITE.about.body_html}
        </div>
      </div>
    </div>
  </div>

  <!-- Marquee gigante semi-transparente — texto enorme rotando -->
  <div class="mrfrias-marquee-ghost">
    <div class="mrfrias-marquee-ghost-inner">
      <span>SALCHIPAPAS</span><span>·</span><span>HOT DOGS</span><span>·</span><span>HAMBURGUESAS</span><span>·</span><span>ALITAS</span><span>·</span><span>QUESADILLAS</span><span>·</span>
      <span>SALCHIPAPAS</span><span>·</span><span>HOT DOGS</span><span>·</span><span>HAMBURGUESAS</span><span>·</span><span>ALITAS</span><span>·</span><span>QUESADILLAS</span><span>·</span>
    </div>
  </div>
</section>

<!-- BLOQUE RESPIRO -->
<section class="mrfrias-respiro-section fix">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
        <img src="assets/img/mrfrias/nuevas/tres x 1.png" alt="Combo Mr. Frías" class="mrfrias-respiro-img img-fluid">
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <h2 class="mrfrias-respiro-title">Sabor que resuelve</h2>
        <p class="mrfrias-respiro-sub">${h(SITE.brand.tagline)}</p>
        <a class="theme-btn" href="#sucursales">Pedir por WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- GALLERY — REAL Fresheat swiper gallery + fondo brick -->
<div class="gallery-section mrfrias-gallery-brick" id="galeria">
  <div class="gallery-wrapper style1">
    <div class="container mb-4">
      <div class="title-area">
        <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s">
          <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Galería <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
        </div>
        <h2 class="title wow fadeInUp" data-wow-delay="0.7s">
          ${h(SITE.galeria.title)}
        </h2>
        <p class="wow fadeInUp mrfrias-section-sub" data-wow-delay="0.8s">${h(SITE.galeria.subtitle)}</p>
      </div>
    </div>
    <div class="container-fluid">
      <div class="slider-area">
        <div class="swiper gallerySliderOne">
          <div class="swiper-wrapper">
            ${galleryImgs.map(img => `
              <div class="swiper-slide">
                <div class="gallery-thumb mrfrias-gallery-thumb">
                  <a href="#sucursales">
                    <img src="assets/img/mrfrias/${h(img)}" alt="Antojos Mr. Frías">
                    <div class="icon"><i class="fab fa-whatsapp"></i></div>
                  </a>
                </div>
              </div>
            `).join('')}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CTA FINAL — Fresheat cta-section + fondo brick + foto hot dog -->
<section class="cta-section fix mrfrias-cta-brick">
  <div class="cta-wrapper style1 section-padding mrfrias-cta-final">
    <div class="container">
      <div class="cta-wrap style1">
        <div class="row align-items-center">
          <div class="col-xl-6 order-2 order-xl-1">
            <div class="cta-content">
              <span class="mrfrias-cta-eyebrow wow fadeInUp" data-wow-delay="0.5s">EL ANTOJO NO ESPERA</span>
              <h2 class="wow fadeInUp mrfrias-cta-title" data-wow-delay="0.7s">${h(SITE.cta_final.title)}</h2>
              <p class="wow fadeInUp" data-wow-delay="0.8s">${h(SITE.cta_final.body)}</p>
              <a class="theme-btn wow fadeInUp" data-wow-delay="0.9s" href="#sucursales">${h(SITE.cta_final.cta.label)} <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-xl-6 order-1 order-xl-2">
            <div class="cta-thumb">
              <img class="img-fluid float-bob-x mrfrias-cta-img" src="assets/img/mrfrias/nuevas/cta-hotdogs-neon.png" alt="Hot dogs Mr. Frías - Soy adicto a la salchipapa">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</main>

<!-- FOOTER -->
<footer class="mrfrias-footer" style="position:relative;overflow:hidden;">
  <img src="assets/img/shape/footerShape1_1.png" alt="" class="mrfrias-footer-shape mrfrias-footer-shape1" aria-hidden="true">
  <img src="assets/img/shape/footerShape1_2.png" alt="" class="mrfrias-footer-shape mrfrias-footer-shape2" aria-hidden="true">
  <img src="assets/img/shape/footerShape1_3.png" alt="" class="mrfrias-footer-shape mrfrias-footer-shape3" aria-hidden="true">
  <img src="assets/img/shape/footerShape1_4.png" alt="" class="mrfrias-footer-shape mrfrias-footer-shape4" aria-hidden="true">
  <div class="container" style="position:relative;z-index:2;">
    <div class="row g-4 mrfrias-footer-top">
      <div class="col-lg-4">
        <a href="#home" class="mrfrias-footer-logo">
          <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck">
        </a>
        <p class="mrfrias-footer-tagline mt-3">${h(SITE.brand.tagline_largo)}</p>
      </div>
      <div class="col-lg-4">
        <h3 class="mrfrias-footer-title">Sucursales</h3>
        <ul class="mrfrias-footer-list">
          ${activas.map(s => `
            <li><a href="${waLink(s.whatsapp_e164, s.mensaje_prellenado)}" target="_blank" rel="noopener">${h(s.nombre)} · ${h(s.telefono_visible)}</a></li>
          `).join('')}
        </ul>
      </div>
      <div class="col-lg-4">
        <h3 class="mrfrias-footer-title">Horario</h3>
        ${SITE.horario.lineas.map(l => `<p class="mrfrias-footer-text">${h(l)}</p>`).join('')}
        <h3 class="mrfrias-footer-title mt-3">Contacto</h3>
        ${SITE.contacto.emails.map(e => `<p class="mrfrias-footer-text"><a href="mailto:${h(e)}">${h(e)}</a></p>`).join('')}
      </div>
    </div>
    <div class="mrfrias-footer-bottom">
      <p>${h(SITE.footer.copyright)}</p>
      <p class="mrfrias-powered-by">${h(SITE.footer.powered_by)}</p>
    </div>
  </div>
</footer>

<a href="${activas.length ? waLink(activas[0].whatsapp_e164, SITE.whatsapp_messages.general) : '#sucursales'}" target="_blank" rel="noopener" class="mrfrias-wa-float" aria-label="Pedir por WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

${activas.map(s => `<script type="application/ld+json">
${JSON.stringify({
  "@context": "https://schema.org",
  "@type": "Restaurant",
  "name": `Mr. Frías Food Truck - ${s.nombre}`,
  "servesCuisine": ["Comida rápida", "Street food", "Panameña"],
  "telephone": "+" + s.whatsapp_e164,
  "address": { "@type": "PostalAddress", "addressLocality": s.nombre, "addressRegion": s.zona, "addressCountry": "PA" },
  "url": "https://mrfriasfoodtruck.com/#sucursales"
}, null, 2)}
</script>`).join('\n')}

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.waypoints.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/viewport.jquery.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/tilt.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/jquery.meanmenu.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/nice-select.min.js"></script>
<script src="assets/js/contact.form.js"></script>
<script src="assets/js/main.js"></script>

<script>
  // Fix Fresheat: WOW.js + viewport plugin a veces no dispara con anchors / one-page.
  // Forzar revelado manual + inicializar WOW con liveness por scroll.
  function initMrFrias() {
    if (typeof WOW !== 'undefined') {
      new WOW({ live: true, mobile: true, offset: 50 }).init();
    }
    setTimeout(function() {
      document.querySelectorAll('.wow:not(.animated)').forEach(function(el) {
        el.style.visibility = 'visible';
        el.style.opacity = '1';
        el.style.animationName = 'none';
      });
    }, 1500);

    if (typeof Swiper === 'undefined') return;

    // Esperar 100ms para asegurarnos de que main.js ya ejecutó su window.load
    setTimeout(function() {
      document.querySelectorAll('.banner-slider, .gallerySliderOne, .bestFoodItems-slider').forEach(function(el) {
        if (el.swiper) { try { el.swiper.destroy(true, true); } catch(e) {} }
      });

      new Swiper('.banner-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: 'slide',
        speed: 700,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: '.pagination-class', clickable: true },
        navigation: { nextEl: '.arrow-next', prevEl: '.arrow-prev' }
      });

      // bestFoodItems: autoplay continuo derecha→izquierda (el carrusel de cards con círculo girando)
      new Swiper('.bestFoodItems-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 4000,
        autoplay: { delay: 1, disableOnInteraction: false, pauseOnMouseEnter: true },
        allowTouchMove: true,
        pagination: { el: '.bestFoodItems-pagination', clickable: true },
        breakpoints: {
          576: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1200: { slidesPerView: 4 }
        }
      });

      new Swiper('.gallerySliderOne', {
        slidesPerView: 1.2,
        spaceBetween: 16,
        loop: true,
        autoplay: { delay: 2500, disableOnInteraction: false },
        breakpoints: {
          576: { slidesPerView: 2.2 },
          768: { slidesPerView: 3.2 },
          992: { slidesPerView: 4.2 },
          1200: { slidesPerView: 5.2 }
        }
      });
    }, 300);
  }

  if (document.readyState === 'complete') initMrFrias();
  else window.addEventListener('load', initMrFrias);
</script>

</body>
</html>
`;

fs.writeFileSync(path.join(root, 'index.html'), html, 'utf8');
console.log('Built index.html (' + Math.round(html.length / 1024) + ' KB)');
