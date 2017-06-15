<?php
global $conf;

$conf['listaPagos'] = array(
	'controlador' => 'pagos.php',
	'vista' => 'pagos/lista.tpl',
	'descripcion' => 'Lista de pago',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpagos'] = array(
	'controlador' => 'pagos.php',
	'descripcion' => 'Controlador de pagos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>