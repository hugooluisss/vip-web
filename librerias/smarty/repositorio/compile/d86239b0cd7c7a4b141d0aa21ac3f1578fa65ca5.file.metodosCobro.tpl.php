<?php /* Smarty version Smarty-3.1.11, created on 2017-09-21 22:22:47
         compiled from "templates/plantillas/modulos/error/metodosCobro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141689037559c48207eb30e6-12640995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd86239b0cd7c7a4b141d0aa21ac3f1578fa65ca5' => 
    array (
      0 => 'templates/plantillas/modulos/error/metodosCobro.tpl',
      1 => 1506050560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141689037559c48207eb30e6-12640995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59c48207ed91b2_56439492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c48207ed91b2_56439492')) {function content_59c48207ed91b2_56439492($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==2){?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en métodos de cobro
		</div>
		<div class="panel-body">
			Es necesario contar con métodos de cobro Ve a Administración - Métodos de cobro y agrega un método de cobro (por lo menos una Caja) para poder iniciar con nu primera nota de venta
		</div>
		<div class="panel-fotter text-center">
			<a href="metodoscobro">Ir métodos de cobro</a>
		</div>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()!=2){?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en métodos de cobro
		</div>
		<div class="panel-body">
			Es necesario contar con métodos de cobro Ve a Administración - Métodos de cobro y agrega un método de cobro (por lo menos una Caja) para poder iniciar con nu primera nota de venta
		</div>
	</div>
<?php }?><?php }} ?>