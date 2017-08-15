<?php /* Smarty version Smarty-3.1.11, created on 2017-08-15 12:40:37
         compiled from "templates/plantillas/modulos/error/bazares.tpl" */ ?>
<?php /*%%SmartyHeaderCode:684942434599332151235a1-08622688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64abcf08c37d4b0ea5ccb60b0415a9f8cb39dc4f' => 
    array (
      0 => 'templates/plantillas/modulos/error/bazares.tpl',
      1 => 1499865261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '684942434599332151235a1-08622688',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_599332151391f5_26438469',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599332151391f5_26438469')) {function content_599332151391f5_26438469($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==1){?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de los bazares
		</div>
		<div class="panel-body">
			Es necesario contar con un bazar... agrega la definición de uno para iniciar con el registro de productos
		</div>
		<div class="panel-fotter text-center">
			<a href="bazares">Ir al catálogo de bazares</a>
		</div>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()!=1){?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de los bazares
		</div>
		<div class="panel-body">
			Es necesario contar con un bazar... solicita que agregén un bazar para iniciar con el trabajo
		</div>
	</div>
<?php }?><?php }} ?>