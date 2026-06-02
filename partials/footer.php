<!-- Footer Mr. Frías -->
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
                <p class="mrfrias-footer-tagline mt-3">
                    <?php echo htmlspecialchars($SITE['brand']['tagline_largo']); ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h5 class="mrfrias-footer-title">Sucursales</h5>
                <ul class="mrfrias-footer-list">
                    <?php foreach (sucursales_activas($SUCURSALES) as $s): ?>
                        <li>
                            <a href="<?php echo wa_link($s['whatsapp_e164'], $s['mensaje_prellenado']); ?>" target="_blank" rel="noopener">
                                <?php echo htmlspecialchars($s['nombre']); ?> · <?php echo htmlspecialchars($s['telefono_visible']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="mrfrias-footer-title">Horario</h5>
                <?php foreach ($SITE['horario']['lineas'] as $linea): ?>
                    <p class="mrfrias-footer-text"><?php echo htmlspecialchars($linea); ?></p>
                <?php endforeach; ?>
                <h5 class="mrfrias-footer-title mt-3">Contacto</h5>
                <?php foreach ($SITE['contacto']['emails'] as $email): ?>
                    <p class="mrfrias-footer-text">
                        <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mrfrias-footer-bottom">
            <p><?php echo htmlspecialchars($SITE['footer']['copyright']); ?></p>
        </div>
    </div>
</footer>
