<?php /* Smarty version Smarty-3.1.11, created on 2017-09-21 22:51:21
         compiled from "templates/plantillas/modulos/error/efectivo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26881649359c48656174ed8-61941051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9f418e67b9e2f3d5f9e89b5014bceed0e9e4580' => 
    array (
      0 => 'templates/plantillas/modulos/error/efectivo.tpl',
      1 => 1506052278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26881649359c48656174ed8-61941051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59c48656190be7_63120369',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c48656190be7_63120369')) {function content_59c48656190be7_63120369($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==2){?>
	<div class="alert alert-warning alert-dismissable">
		<div class="panel-heading">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<b>No has agregado una caja</b>
			<p>Para poder cobrar en efectivo, te recomendamos agregar por lo menos una caja en la sección Administración - Métodos de cobro - Agregar. Ahí, selecciona el tipo "Efectivo" y dale un destino o nombre (por ejemplo: "Caja Juan")</p>
			<p class="text-right">
				<a href="miEmpresa" class="btn btn-danger">Ir a Métodos de cobro</a>
				<button class="btn btn-default" data-dismiss="alert" aria-label="close">Cerrar</button>
			</p>
			
		</div>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()!=2){?>
	<div class="alert alert-warning alert-dismissable">
		<div class="panel-heading">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<b>No has agregado una caja</b>
			<p>Para poder cobrar en efectivo, te recomendamos agregar por lo menos una caja en la sección Administración - Métodos de cobro - Agregar. Ahí, selecciona el tipo "Efectivo" y dale un destino o nombre (por ejemplo: "Caja Juan")</p>
		</div>
	</div>
<?php }?><?php }} ?>