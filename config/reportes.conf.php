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
	
$conf['reporteexistencias'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/existencias.tpl',
	'descripcion' => 'Reporte de existencias',
	'seguridad' => true,
	'js' => array('venta.class.js'),
	'jsTemplate' => array('reporteExistencias.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaReporteExistencias'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaExistencias.tpl',
	'descripcion' => 'Lista de existencias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaReporteVentasProducto'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaVentasProducto.tpl',
	'descripcion' => 'Lista de ventas de un producto',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaReportesPagosPorVenta'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaPagos.tpl',
	'descripcion' => 'Lista de pagos por venta',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['reportepedidos'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/pedidos.tpl',
	'descripcion' => 'Reporte de pedidos',
	'seguridad' => true,
	'js' => array('venta.class.js'),
	'jsTemplate' => array('reportepedidos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaReportePedidos'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaPedidos.tpl',
	'descripcion' => 'Lista de pedidos sin entregar',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>