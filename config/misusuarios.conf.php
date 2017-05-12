<?php
global $conf;

$conf['misUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panelMisUsuarios.tpl',
	'descripcion' => 'Panel de administración de usuarios para el dueño',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('misUsuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaUsuariosBazar'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>