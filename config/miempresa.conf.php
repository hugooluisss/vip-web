<?php
global $conf;

$conf['miEmpresa'] = array(
	'controlador' => 'empresas.php',
	'vista' => 'empresas/panelMiEmpresa.tpl',
	'descripcion' => 'Configuración de la empresa del usuario',
	'seguridad' => true,
	'js' => array('empresa.class.js'),
	'jsTemplate' => array('miEmpresa.js'),
	'capa' => LAYOUT_DEFECTO);
?>