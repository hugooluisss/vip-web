<?php
global $conf;

$conf['controlinventario'] = array(
	'controlador' => 'operaciones.php',
	'vista' => 'operaciones/panel.tpl',
	'descripcion' => 'operaciones',
	'seguridad' => true,
	'js' => array('operacion.class.js', 'producto.class.js'),
	'jsTemplate' => array('operaciones.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaOperaciones'] = array(
	'controlador' => 'operaciones.php',
	'vista' => 'operaciones/lista.tpl',
	'descripcion' => 'Lista de operaciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['coperaciones'] = array(
	'controlador' => 'operaciones.php',
	'descripcion' => 'Controlador de operaciones',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);	
?>