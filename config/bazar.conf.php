<?php
global $conf;

$conf['bazares'] = array(
	'controlador' => 'bazares.php',
	'vista' => 'bazares/panel.tpl',
	'descripcion' => 'Bazares',
	'seguridad' => true,
	'js' => array('bazar.class.js', 'usuario.class.js'),
	'jsTemplate' => array('bazares.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaBazares'] = array(
	'controlador' => 'bazares.php',
	'vista' => 'bazares/lista.tpl',
	'descripcion' => 'Lista de bazares',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cbazares'] = array(
	'controlador' => 'bazares.php',
	'descripcion' => 'Controlador de bazares',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['productos'] = array(
	'controlador' => 'bazares.php',
	'vista' => 'bazares/panelInventario.tpl',
	'descripcion' => 'Inventario',
	'seguridad' => true,
	'js' => array('producto.class.js'),
	'jsTemplate' => array('inventario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cproductos'] = array(
	'controlador' => 'productos.php',
	'descripcion' => 'Controlador de productos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['listaProductos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'bazares/listaProductos.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaProductosAutocomplete'] = array(
	'controlador' => 'productos.php',
	'vista' => 'bazares/listaProductos.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['productosImportar'] = array(
	'controlador' => 'productos.php',
	'vista' => 'bazares/listaProductosImportar.tpl',
	'descripcion' => 'Lista de productos a importar',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>