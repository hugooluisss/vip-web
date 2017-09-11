<?php
global $conf;

$conf['tarjetas'] = array(
	'controlador' => 'tarjetas.php',
	'vista' => 'tarjetas/panel.tpl',
	'descripcion' => 'Panel de administración de tarjetas',
	'seguridad' => true,
	'js' => array('empresa.class.js'),
	'jsTemplate' => array('tarjetas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaTarjetas'] = array(
	'controlador' => 'tarjetas.php',
	'vista' => 'tarjetas/lista.tpl',
	'descripcion' => 'Lista de tarjetas con conekta',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctarjetas'] = array(
	'controlador' => 'tarjetas.php',
	'descripcion' => 'Controlador de tarjetas',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['jsonTarjetas'] = array(
	'controlador' => 'tarjetas.php',
	#'vista' => 'tarjetas/lista.tpl',
	'descripcion' => 'Lista de tarjetas con conekta',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>