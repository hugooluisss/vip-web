<?php
global $conf;

$conf['metodoscobro'] = array(
	'controlador' => 'metodoscobro.php',
	'vista' => 'metodoscobro/panel.tpl',
	'descripcion' => 'Métodos de pago',
	'seguridad' => true,
	'js' => array('metodoCobro.class.js'),
	'jsTemplate' => array('metodosCobro.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaMetodosCobro'] = array(
	'controlador' => 'metodoscobro.php',
	'vista' => 'metodoscobro/lista.tpl',
	'descripcion' => 'Lista de metodos de cobro',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cmetodoscobro'] = array(
	'controlador' => 'metodoscobro.php',
	'descripcion' => 'Controlador de metodoscobro',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>