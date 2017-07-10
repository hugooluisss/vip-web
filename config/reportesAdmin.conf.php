<?php
global $conf;

$conf['admonreporteventasempresa'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/ventas.tpl',
	'descripcion' => 'Reporte de ventas',
	'seguridad' => true,
	'js' => array('venta.class.js'),
	'jsTemplate' => array('reporteAdminVentas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaReporteAdminVentas'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/listaVentas.tpl',
	'descripcion' => 'Lista de ventas para el reporte de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
?>