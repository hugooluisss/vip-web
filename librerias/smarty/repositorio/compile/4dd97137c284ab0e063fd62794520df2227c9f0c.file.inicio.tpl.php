<?php /* Smarty version Smarty-3.1.11, created on 2017-05-09 12:29:16
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15484641355911fc6c1fa969-10889533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1494342886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15484641355911fc6c1fa969-10889533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5911fc6c2054e6_28625244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5911fc6c2054e6_28625244')) {function content_5911fc6c2054e6_28625244($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>

	</div>
</div><?php }} ?>