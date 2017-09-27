<?php /* Smarty version Smarty-3.1.11, created on 2017-09-21 19:36:42
         compiled from "templates/plantillas/modulos/error/empresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191521019359c40ebd216b61-78254525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a76aa5dd251368c3d1b52a4e4ce6d7e6ae166c3' => 
    array (
      0 => 'templates/plantillas/modulos/error/empresas.tpl',
      1 => 1506040594,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191521019359c40ebd216b61-78254525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59c40ebd27b3a7_57606501',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c40ebd27b3a7_57606501')) {function content_59c40ebd27b3a7_57606501($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==2){?>
	<div class="panel panel-danger">
		<div class="panel-heading">Actualiza los datos de tu empresa</div>
		<div class="panel-body">
			<p>Al parecer aun no has actualizado la información de tu empresa.
Es un paso obligatorio para terminar tu registro. Además, eso ayudará a tus clientes a identificarte.</p>
		</div>
		<div class="panel-footer text-right">
				<a href="miEmpresa" >Ir a Mi empresa</a>
		</div>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()!=2){?>
	<div class="panel panel-danger">
		<div class="panel-heading">Actualiza los datos de tu empresa</div>
		<div class="panel-body">
			<p>Al parecer aun no has actualizado la información de tu empresa. Es un paso obligatorio para terminar tu registro. Además, eso ayudará a tus clientes a identificarte.</p>

			<p>Pídele al responsable del bazar que registre los datos</p>
		</div>
	</div>
<?php }?><?php }} ?>