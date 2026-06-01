<?php
$activas = sucursales_activas($SUCURSALES);
$primer_wa = !empty($activas) ? wa_link($activas[0]['whatsapp_e164'], $SITE['whatsapp_messages']['general']) : '#sucursales';
?>
<header class="header-section header-1">
    <div class="black-bg"></div>
    <div class="red-bg"></div>
    <div class="container-fluid">
        <div class="main-header-wrapper">
            <div class="logo-image">
                <a href="#home">
                    <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck" style="max-height:60px;">
                </a>
            </div>
            <div class="main-header-items">
                <div class="header-top-wrapper">
                    <span><i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($SITE['horario']['lineas'][0]); ?></span>
                    <div class="social-icon d-flex align-items-center">
                        <span>Pedidos:</span>
                        <?php foreach (array_slice($activas, 0, 3) as $s): ?>
                            <a href="<?php echo wa_link($s['whatsapp_e164'], $s['mensaje_prellenado']); ?>" target="_blank" rel="noopener" title="<?php echo htmlspecialchars($s['nombre']); ?>"><i class="fab fa-whatsapp"></i></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div id="header-sticky" class="header-1">
                    <div class="mega-menu-wrapper">
                        <div class="header-main">
                            <div class="logo">
                                <a href="#home" class="header-logo">
                                    <img src="assets/img/mrfrias/logo.png" alt="Mr. Frías Food Truck" style="max-height:60px;">
                                </a>
                            </div>
                            <div class="header-left">
                                <div class="mean__menu-wrapper">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <?php foreach ($SITE['nav'] as $item): ?>
                                                    <li><a href="<?php echo htmlspecialchars($item['anchor']); ?>"><?php echo htmlspecialchars($item['label']); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right d-flex justify-content-end align-items-center">
                                <a class="theme-btn" href="#sucursales">
                                    <?php echo htmlspecialchars($SITE['cta_header']['label']); ?>
                                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                </a>
                                <div class="header__hamburger d-xl-none my-auto ms-3">
                                    <div class="sidebar__toggle">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
