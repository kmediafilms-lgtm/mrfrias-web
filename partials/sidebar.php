  <!-- Offcanvas Area Start -->
  <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.php">
                                <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck logo" style="max-height: 60px;">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-lg-block">
                        <?php echo htmlspecialchars($SITE['brand']['tagline_largo']); ?>
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
                                    <a href="mailto:<?php echo htmlspecialchars($SITE['contacto']['emails'][0]); ?>">
                                        <span><?php echo htmlspecialchars($SITE['contacto']['emails'][0]); ?></span>
                                    </a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <span>
                                        <?php echo htmlspecialchars($SITE['horario']['lineas'][0]); ?><br>
                                        <?php echo htmlspecialchars($SITE['horario']['lineas'][1]); ?>
                                    </span>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <?php 
                                    $activas = sucursales_activas($SUCURSALES);
                                    $tel_main = !empty($activas) ? $activas[0]['telefono_visible'] : '6571-6825';
                                    ?>
                                    <a href="tel:<?php echo str_replace('-', '', $tel_main); ?>">+507 <?php echo htmlspecialchars($tel_main); ?></a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-button mt-4">
                            <?php 
                            $wa_main = !empty($activas) ? wa_link($activas[0]['whatsapp_e164'], $SITE['whatsapp_messages']['general']) : '#sucursales';
                            ?>
                            <a href="<?php echo htmlspecialchars($wa_main); ?>" target="_blank" rel="noopener" class="theme-btn">
                                <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                    <span class="button-icon"><i class="fab fa-whatsapp bg-transparent text-white me-2" style="font-size: 1.2rem;"></i></span>
                                    <span class="button-text">PEDIR AHORA</span>
                                </span>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <?php if (!empty($SITE['contacto']['redes']['instagram'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['instagram']); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($SITE['contacto']['redes']['facebook'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['facebook']); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($SITE['contacto']['redes']['tiktok'])): ?>
                                <a href="<?php echo htmlspecialchars($SITE['contacto']['redes']['tiktok']); ?>" target="_blank" rel="noopener"><i class="fab fa-tiktok"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>