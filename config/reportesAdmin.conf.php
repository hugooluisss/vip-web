<?php
global $conf;

$conf['admonreporteventasempresa'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/ventas.tpl',
	'descripcion' => 'Reporte de ventas',
	'seguridad' => true,
	'js' => array('empresa.class.js', 'venta.class.js'),
	'jsTemplate' => array('reporteAdminVentas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaReporteAdminVentas'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/listaVentas.tpl',
	'descripcion' => 'Lista de ventas para el reporte de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);	


	
$conf['cobranza'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/cobranza.tpl',
	'descripcion' => 'Reporte de cobranza',
	'seguridad' => true,
	'js' => array('comision.class.js'),
	'jsTemplate' => array('reporteCobranza.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaCobranza'] = array(
	'controlador' => 'reportesAdmin.php',
	'vista' => 'reportesAdmin/listaCobranza.tpl',
	'descripcion' => 'Lista de cobranza',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccobranza'] = array(
	'controlador' => 'reportesAdmin.php',
	'descripcion' => 'Controlador de cobranzas y comisiones',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>