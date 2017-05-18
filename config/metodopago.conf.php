<?php
global $conf;

$conf['metodospago'] = array(
	'controlador' => 'metodospago.php',
	'vista' => 'metodospago/panel.tpl',
	'descripcion' => 'Métodos de pago',
	'seguridad' => true,
	'js' => array('metodoPago.class.js'),
	'jsTemplate' => array('metodosPago.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaMetodosPago'] = array(
	'controlador' => 'metodospago.php',
	'vista' => 'metodospago/lista.tpl',
	'descripcion' => 'Lista de metodos de pago',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cmetodospago'] = array(
	'controlador' => 'metodospago.php',
	'descripcion' => 'Controlador de metodospago',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>