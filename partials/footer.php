<!-- Footer Mr. Frías -->
<footer class="mrfrias-footer">
    <div class="container">
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
