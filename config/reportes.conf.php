<?php
global $conf;

$conf['reporteventas'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/ventas.tpl',
	'descripcion' => 'Reporte de ventas',
	'seguridad' => true,
	'js' => array('venta.class.js'),
	'jsTemplate' => array('reporteventas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaReporteVentas'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaVentas.tpl',
	'descripcion' => 'Lista de ventas para el reporte de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>