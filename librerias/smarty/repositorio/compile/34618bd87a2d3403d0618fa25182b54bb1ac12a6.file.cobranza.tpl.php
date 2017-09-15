<?php /* Smarty version Smarty-3.1.11, created on 2017-09-15 10:19:28
         compiled from "templates/plantillas/modulos/reportesAdmin/cobranza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150501701159ab22424fed38-80958033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34618bd87a2d3403d0618fa25182b54bb1ac12a6' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/cobranza.tpl',
      1 => 1505488717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150501701159ab22424fed38-80958033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ab224256d2e3_85591322',
  'variables' => 
  array (
    'PAGE' => 0,
    'openpay' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ab224256d2e3_85591322')) {function content_59ab224256d2e3_85591322($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Cobranza</h1>
	</div>
</div>

<div class="btn-toolbar" role="toolbar" aria-label="...">
	<div class="btn-group" role="group" aria-label="...">
		<button class="btn btn-xs btn-warning" id="btnGenerar">Generar cobranza</button>
	</div>
</div>
<br />
<div class="panel panel-default">
	<div class="panel-body" id="dvLista">
		
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/reportesAdmin/winOrden.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<input type="hidden" id="merchant" value="<?php echo $_smarty_tpl->tpl_vars['openpay']->value['id'];?>
" />
<input type="hidden" id="public" value="<?php echo $_smarty_tpl->tpl_vars['openpay']->value['key_public'];?>
" />

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/reportesAdmin/winUpFactura.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>