<?php
/**
 * Loader de contenido del sitio.
 * Lee los JSON de /content y los expone como arrays PHP.
 * El usuario edita los JSON, este loader los inyecta al index.
 */
$SITE = json_decode(file_get_contents(__DIR__ . '/content/site.json'), true);
$SUCURSALES = json_decode(file_get_contents(__DIR__ . '/content/sucursales.json'), true)['sucursales'];
$MENU = json_decode(file_get_contents(__DIR__ . '/content/menu.json'), true)['categorias'];

/**
 * Construye un link wa.me con mensaje prellenado.
 */
function wa_link($e164, $mensaje) {
  if (empty($e164)) return '#sucursales';
  return 'https://wa.me/' . urlencode($e164) . '?text=' . rawurlencode($mensaje);
}

/**
 * Sucursales activas (con número validado).
 */
function sucursales_activas($sucursales) {
  return array_values(array_filter($sucursales, fn($s) => $s['estado'] === 'activo'));
}
