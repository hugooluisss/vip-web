<?php
global $conf;

$conf['puntoventa'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/panel.tpl',
	'descripcion' => 'Ventas',
	'seguridad' => true,
	'js' => array('venta.class.js', 'producto.class.js', 'cliente.class.js', 'bazar.class.js'),
	'jsTemplate' => array('ventas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaVentas'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/lista.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cventas'] = array(
	'controlador' => 'bazares.php',
	'descripcion' => 'Controlador de bazares',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>