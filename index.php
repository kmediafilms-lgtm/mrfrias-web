<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($SITE['seo']['lang']); ?>">
<?php include 'partials/head.php'; ?>

<body class="mrfrias-body">

<?php include 'partials/preloader.php'; ?>
<?php include 'partials/scroll-up.php'; ?>
<?php include 'partials/mouse-cursor.php'; ?>
<?php include 'partials/sidebar.php'; ?>
<?php include 'partials/header.php'; ?>

<!-- ============================================================
     1. HERO (BANNER SECTION con Swiper y Shapes)
============================================================ -->
<?php
$heroSlides = [
    [
        'sub' => 'EL SPOT DE LOS ANTOJOS',
        'title' => 'Hamburguesas con flow',
        'text' => 'Carne sellada, pan suave, antojo resuelto en cada mordida.',
        'img' => 'nuevas/hero-burger-exploded.png'
    ],
    [
        'sub' => 'STREET FOOD PANAMEÑO',
        'title' => 'Hot dogs de calle',
        'text' => 'Con flow de food truck. Salsas, toppings y carácter.',
        'img' => 'nuevas/hotdog-side 1.png'
    ],
    [
        'sub' => 'CUANDO EL ANTOJO PEGA',
        'title' => 'Burger del antojo',
        'text' => 'Cargadas, sabrosas, imposibles de soltar. El antojo no perdona.',
        'img' => 'nuevas/hero-burger-vertical.png'
    ]
];
?>
<section id="home" class="banner-section fix mrfrias-banner-brick">
    <div class="slider-area">
        <div class="swiper banner-slider">
            <div class="swiper-wrapper">
                <?php foreach ($heroSlides as $i => $slide): ?>
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
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="banner-title-area">
                                                <div class="banner-style1">
                                                    <div class="section-title">
                                                        <span class="sub-title mrfrias-banner-sub" data-animation="slideInRight" data-duration="2s" data-delay=".3s"><?php echo htmlspecialchars($slide['sub']); ?></span>
                                                        <?php if ($i === 0): ?>
                                                            <h1 class="title mrfrias-banner-title" data-animation="slideInRight" data-duration="2s" data-delay=".5s"><?php echo htmlspecialchars($SITE['hero']['h1']); ?></h1>
                                                        <?php else: ?>
                                                            <h2 class="title mrfrias-banner-title" data-animation="slideInRight" data-duration="2s" data-delay=".5s"><?php echo htmlspecialchars($slide['title']); ?></h2>
                                                        <?php endif; ?>
                                                        <p class="mrfrias-banner-text" data-animation="slideInRight" data-duration="2s" data-delay=".6s"><?php echo htmlspecialchars($slide['text']); ?></p>
                                                        <a class="theme-btn" href="#sucursales" data-animation="slideInRight" data-duration="2s" data-delay=".7s"><?php echo htmlspecialchars($SITE['hero']['cta_primary']['label']); ?> <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 d-none d-lg-block">
                                            <div class="banner-thumb-area is-transparent" data-tilt data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                                <img src="assets/img/mrfrias/<?php echo htmlspecialchars($slide['img']); ?>" alt="<?php echo htmlspecialchars($slide['title']); ?>" class="mrfrias-banner-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="arrow-prev mrfrias-arrow"><i class="fa-regular fa-chevron-left"></i></div>
            <div class="arrow-next mrfrias-arrow"><i class="fa-regular fa-chevron-right"></i></div>
            <div class="pagination-class swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- ============================================================
     2. ESPECIALIDADES (Carrusel de Antojos)
============================================================ -->
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
                    <?php echo htmlspecialchars($SITE['especialidades']['title']); ?>
                </h2>
                <p class="wow fadeInUp mrfrias-section-sub" data-wow-delay="0.8s"><?php echo htmlspecialchars($SITE['especialidades']['subtitle']); ?></p>
            </div>
            <div class="slider-area mb-n40">
                <div class="swiper bestFoodItems-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($MENU as $item): ?>
                            <div class="swiper-slide">
                                <div class="single-food-items">
                                    <div class="circle-shape"><img class="cir36" src="assets/img/food-items/circleShape.png" alt="shape"></div>
                                    <div class="item-thumb">
                                        <img src="assets/img/mrfrias/<?php echo htmlspecialchars($item['imagen_base']); ?>.800x725.jpeg" alt="<?php echo htmlspecialchars($item['nombre']); ?>">
                                    </div>
                                    <div class="item-content">
                                        <a href="#sucursales">
                                            <h3><?php echo htmlspecialchars($item['nombre']); ?></h3>
                                        </a>
                                        <div class="text"><?php echo htmlspecialchars($item['descripcion']); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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

<!-- ============================================================
     3. SUCURSALES (chefe-section + fondo brick)
============================================================ -->
<section id="sucursales" class="chefe-section fix section-padding mrfrias-sucursales-brick">
    <div class="chefe-wrapper style1">
        <div class="container">
            <div class="title-area">
                <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s">
                    <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Sucursales <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                </div>
                <h2 class="title wow fadeInUp text-white" data-wow-delay="0.7s">
                    <?php echo htmlspecialchars($SITE['sucursales_section']['title']); ?>
                </h2>
                <p class="wow fadeInUp mrfrias-section-sub mrfrias-sub-light" data-wow-delay="0.8s"><?php echo htmlspecialchars($SITE['sucursales_section']['subtitle']); ?></p>
            </div>
            <div class="chefe-card-wrap style1 pb-5">
                <div class="row g-4">
                    <?php foreach ($SUCURSALES as $i => $s): ?>
                        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.<?php echo 2 + ($i % 5); ?>s">
                            <div class="chefe-card style1 mrfrias-sucursal-card-v3">
                                <!-- Silueta superior decorativa (sin foto, solo forma) -->
                                <div class="mrfrias-sucursal-silueta">
                                    <svg viewBox="0 0 100 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                        <path d="M0 0 L100 0 L100 30 Q100 60 70 60 L30 60 Q0 60 0 30 Z" fill="currentColor"/>
                                    </svg>
                                    <div class="mrfrias-sucursal-pin">
                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                    </div>
                                </div>
                                <div class="mrfrias-sucursal-info">
                                    <p class="mrfrias-sucursal-zona-v2"><?php echo htmlspecialchars($s['zona']); ?></p>
                                    <p class="mrfrias-sucursal-tel-v2"><i class="fab fa-whatsapp"></i> <?php echo htmlspecialchars($s['telefono_visible']); ?></p>
                                </div>
                                <div class="chefe-content">
                                    <h3 class="mrfrias-sucursal-name-v2"><?php echo htmlspecialchars($s['nombre']); ?></h3>
                                    <a class="theme-btn mrfrias-pedido-btn" href="<?php echo wa_link($s['whatsapp_e164'], $s['mensaje_prellenado']); ?>" target="_blank" rel="noopener">
                                        Haz tu pedido aquí <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <p class="text-center mt-5 mrfrias-microcopy mrfrias-sub-light"><?php echo htmlspecialchars($SITE['sucursales_section']['microcopy']); ?></p>
        </div>
    </div>
</section>

<!-- ============================================================
     4. ACERCA DE NOSOTROS
============================================================ -->
<section id="nosotros" class="mrfrias-acerca-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                <img src="assets/img/mrfrias/nuevas/about-mesa-gente.jpg" alt="Mesa Mr. Frías con amigos compartiendo comida" class="mrfrias-acerca-img">
            </div>
            <div class="col-lg-6">
                <h2 class="mrfrias-acerca-title wow fadeInUp" data-wow-delay="0.5s">ACERCA DE NOSOTROS</h2>
                <div class="mrfrias-acerca-body wow fadeInUp" data-wow-delay="0.7s">
                    <?php echo $SITE['about']['body_html']; ?>
                </div>
                <div class="btn-wrapper wow fadeInUp mt-4" data-wow-delay="0.9s">
                    <a class="theme-btn" href="#sucursales">PEDIR AHORA <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Marquee gigante semi-transparente — texto enorme rotando -->
    <div class="mrfrias-marquee-ghost">
        <div class="mrfrias-marquee-ghost-inner">
            <span>SALCHIPAPAS</span><span>·</span><span>HOT DOGS</span><span>·</span><span>HAMBURGUESAS</span><span>·</span><span>ALITAS</span><span>·</span><span>QUESADILLAS</span><span>·</span><span>WRAPS</span><span>·</span><span>DEDITOS</span><span>·</span>
            <span>SALCHIPAPAS</span><span>·</span><span>HOT DOGS</span><span>·</span><span>HAMBURGUESAS</span><span>·</span><span>ALITAS</span><span>·</span><span>QUESADILLAS</span><span>·</span><span>WRAPS</span><span>·</span><span>DEDITOS</span><span>·</span>
        </div>
    </div>
</section>

<!-- ============================================================
     5. GALERÍA (Swiper slider)
============================================================ -->
<div class="gallery-section mrfrias-gallery-brick" id="galeria">
    <div class="gallery-wrapper style1">
        <div class="container mb-4">
            <div class="title-area">
                <div class="sub-title text-center wow fadeInUp" data-wow-delay="0.5s">
                    <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Galería <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
                </div>
                <h2 class="title wow fadeInUp" data-wow-delay="0.7s">
                    <?php echo htmlspecialchars($SITE['galeria']['title']); ?>
                </h2>
                <p class="wow fadeInUp mrfrias-section-sub" data-wow-delay="0.8s"><?php echo htmlspecialchars($SITE['galeria']['subtitle']); ?></p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="slider-area">
                <div class="swiper gallerySliderOne">
                    <div class="swiper-wrapper">
                        <?php
                        $galleryImgs = [
                            'whatsapp_image_2023-10-11_at_12_34_21_am.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_21_am_1.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_21_am_2.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_23_am.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_24_am.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_25_am.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_26_am.800x725.jpeg',
                            'whatsapp_image_2023-10-11_at_12_34_24_am_1.800x725.jpeg',
                        ];
                        foreach ($galleryImgs as $img):
                        ?>
                            <div class="swiper-slide">
                                <div class="gallery-thumb mrfrias-gallery-thumb">
                                    <a href="#sucursales">
                                        <img src="assets/img/mrfrias/<?php echo htmlspecialchars($img); ?>" alt="Antojos Mr. Frías" loading="lazy">
                                        <div class="icon"><i class="fab fa-whatsapp"></i></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================
     6. HORARIO
============================================================ -->
<section id="horario" class="section-padding mrfrias-horario-section">
    <div class="container">
        <div class="title-area text-center">
            <div class="sub-title wow fadeInUp" data-wow-delay="0.5s">
                <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Estamos Abiertos <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
            </div>
            <h2 class="title wow fadeInUp" data-wow-delay="0.7s"><?php echo htmlspecialchars($SITE['horario']['title']); ?></h2>
            <?php foreach ($SITE['horario']['lineas'] as $linea): ?>
                <p class="mrfrias-horario-line wow fadeInUp"><?php echo htmlspecialchars($linea); ?></p>
            <?php endforeach; ?>
            <p class="mrfrias-microcopy mt-3">Llegar con hambre es parte del plan.</p>
        </div>
    </div>
</section>

<!-- ============================================================
     7. CTA FINAL (neon hotdog)
============================================================ -->
<section class="cta-section fix mrfrias-cta-brick">
    <div class="cta-wrapper style1 section-padding mrfrias-cta-final">
        <div class="container">
            <div class="cta-wrap style1">
                <div class="row align-items-center">
                    <div class="col-xl-6 order-2 order-xl-1">
                        <div class="cta-content">
                            <span class="mrfrias-cta-eyebrow wow fadeInUp" data-wow-delay="0.5s">EL ANTOJO NO ESPERA</span>
                            <h2 class="wow fadeInUp mrfrias-cta-title" data-wow-delay="0.7s"><?php echo htmlspecialchars($SITE['cta_final']['title']); ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.8s"><?php echo htmlspecialchars($SITE['cta_final']['body']); ?></p>
                            <a class="theme-btn wow fadeInUp" data-wow-delay="0.9s" href="#sucursales"><?php echo htmlspecialchars($SITE['cta_final']['cta']['label']); ?> <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
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

<!-- ============================================================
     8. CONTACTO
============================================================ -->
<section id="contacto" class="section-padding mrfrias-contacto-section bg-color2">
    <div class="container">
        <div class="title-area text-center mb-5">
            <div class="sub-title wow fadeInUp" data-wow-delay="0.5s">
                <img class="me-1" src="assets/img/icon/titleIcon.svg" alt="icon"> Contacto <img class="ms-1" src="assets/img/icon/titleIcon.svg" alt="icon">
            </div>
            <h2 class="title wow fadeInUp" data-wow-delay="0.7s"><?php echo htmlspecialchars($SITE['contacto']['title']); ?></h2>
        </div>
        <div class="row g-5 align-items-stretch">
            <!-- Formulario de Contacto -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="contact-form style2 p-4 p-md-5 bg-white rounded-3 shadow-sm">
                    <h3 class="mb-4 text-dark font-weight-bold">Escríbenos</h3>
                    <form class="row g-3" id="contact-form" action="mailer.php" method="POST">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" placeholder="Nombre completo" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" placeholder="Correo electrónico" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" placeholder="Teléfono" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="subject" id="subject" placeholder="Asunto" class="form-control">
                        </div>
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="Escribe tu mensaje aquí..." rows="5" required class="form-control"></textarea>
                        </div>
                        <div class="col-12 form-group mb-0 mt-3">
                            <button type="submit" class="theme-btn w-100 justify-content-center">
                                ENVIAR MENSAJE 
                                <i class="fa-sharp fa-regular fa-arrow-right-long bg-transparent text-white ms-2"></i>
                            </button>
                        </div>
                    </form>
                    <div id="form-messages" class="mt-3"></div>
                </div>
            </div>
            <!-- Información de Contacto -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.5s">
                <div class="contact-info-wrapper p-4 p-md-5 h-100 bg-white rounded-3 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h3 class="mb-4 text-dark font-weight-bold">Información</h3>
                        <div class="contact-info-list">
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon me-3 mt-1 text-danger" style="font-size: 1.5rem;">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-1 font-weight-bold">Ubicaciones</h5>
                                    <p class="text-muted mb-0">Panamá Oeste & Ciudad de Panamá</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon me-3 mt-1 text-danger" style="font-size: 1.5rem;">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-1 font-weight-bold">Correo Electrónico</h5>
                                    <?php foreach ($SITE['contacto']['emails'] as $email): ?>
                                        <p class="mb-0"><a href="mailto:<?php echo htmlspecialchars($email); ?>" class="text-muted"><?php echo htmlspecialchars($email); ?></a></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon me-3 mt-1 text-danger" style="font-size: 1.5rem;">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mb-1 font-weight-bold">Horarios de Atención</h5>
                                    <?php foreach ($SITE['horario']['lineas'] as $linea): ?>
                                        <p class="text-muted mb-0"><?php echo htmlspecialchars($linea); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h5 class="text-dark mb-3 font-weight-bold">Síguenos en Redes</h5>
                        <div class="social-icons d-flex gap-3">
                            <?php if (!empty($SITE['contacto']['redes']['instagram'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['instagram']); ?>" target="_blank" rel="noopener" class="text-danger" style="font-size: 1.8rem;"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($SITE['contacto']['redes']['facebook'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['facebook']); ?>" target="_blank" rel="noopener" class="text-danger" style="font-size: 1.8rem;"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($SITE['contacto']['redes']['tiktok'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['tiktok']); ?>" target="_blank" rel="noopener" class="text-danger" style="font-size: 1.8rem;"><i class="fab fa-tiktok"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>

<a href="<?php echo htmlspecialchars($primer_wa); ?>" target="_blank" rel="noopener" class="mrfrias-wa-float" aria-label="Pedir por WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<?php foreach ($activas as $s): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Restaurant",
  "name": "Mr. Frías Food Truck - <?php echo $s['nombre']; ?>",
  "servesCuisine": ["Comida rápida", "Street food", "Panameña"],
  "telephone": "+<?php echo $s['whatsapp_e164']; ?>",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "<?php echo $s['nombre']; ?>",
    "addressRegion": "<?php echo $s['zona']; ?>",
    "addressCountry": "PA"
  },
  "url": "https://mrfriasfoodtruck.com/#sucursales"
}
</script>
<?php endforeach; ?>

<?php
$script = '
<script>
  function initMrFrias() {
    if (typeof WOW !== "undefined") {
      new WOW({ live: true, mobile: true, offset: 50 }).init();
    }
    setTimeout(function() {
      document.querySelectorAll(".wow:not(.animated)").forEach(function(el) {
        el.style.visibility = "visible";
        el.style.opacity = "1";
        el.style.animationName = "none";
      });
    }, 1500);

    if (typeof Swiper === "undefined") return;

    setTimeout(function() {
      document.querySelectorAll(".banner-slider, .gallerySliderOne, .bestFoodItems-slider").forEach(function(el) {
        if (el.swiper) { try { el.swiper.destroy(true, true); } catch(e) {} }
      });

      new Swiper(".banner-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: "slide",
        speed: 700,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: ".pagination-class", clickable: true },
        navigation: { nextEl: ".arrow-next", prevEl: ".arrow-prev" }
      });

      new Swiper(".bestFoodItems-slider", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 4000,
        autoplay: { delay: 1, disableOnInteraction: false, pauseOnMouseEnter: true },
        allowTouchMove: true,
        pagination: { el: ".bestFoodItems-pagination", clickable: true },
        breakpoints: {
          576: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1200: { slidesPerView: 4 }
        }
      });

      new Swiper(".gallerySliderOne", {
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

  if (document.readyState === "complete") initMrFrias();
  else window.addEventListener("load", initMrFrias);
</script>
';
include 'partials/script.php';
?>

</body>
</html>
