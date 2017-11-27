<?php /* Smarty version Smarty-3.1.11, created on 2017-10-23 21:43:12
         compiled from "templates/plantillas/modulos/reportes/cobranza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148464690259ad75bca85656-13860211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68b255d025ce1642515c1b21c0a061b2eda8bd6f' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/cobranza.tpl',
      1 => 1506742715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148464690259ad75bca85656-13860211',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ad75bca87c65_56226050',
  'variables' => 
  array (
    'fin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ad75bca87c65_56226050')) {function content_59ad75bca87c65_56226050($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/vip-web/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Comisiones VIP System</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 col-md-2 text-right">
				<label for="txtInicio">Inicio</label>
			</div>
			<div class="col-xs-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtInicio" name="txtInicio" value="<?php echo $_smarty_tpl->tpl_vars['fin']->value;?>
" readonly/>
			</div>
			<div class="col-xs-2 col-md-2 col-md-offset-1 text-right">
				<label for="txtFin">Fin</label>
			</div>
			<div class="col-xs-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtFin" name="txtFin" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" readonly/>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body" id="dvLista">
		
	</div>
</div><?php }} ?>