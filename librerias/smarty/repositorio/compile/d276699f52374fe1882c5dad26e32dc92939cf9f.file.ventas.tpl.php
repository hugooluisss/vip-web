<?php /* Smarty version Smarty-3.1.11, created on 2017-08-18 10:32:08
         compiled from "templates/plantillas/modulos/reportes/ventas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1273032186595a5ed28ac366-22650336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd276699f52374fe1882c5dad26e32dc92939cf9f' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/ventas.tpl',
      1 => 1499953231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1273032186595a5ed28ac366-22650336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_595a5ed28ad0f7_58044801',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
    'estados' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595a5ed28ad0f7_58044801')) {function content_595a5ed28ad0f7_58044801($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/vip-web/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-sm-3">
		<h1 class="page-header">Reporte de ventas</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selBazar">Bazar</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selBazar" name="selBazar" class="form-control">
					<option value="">Todos</option>
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bazares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-2 col-md-2 text-right">
				<label for="txtInicio">Inicio</label>
			</div>
			<div class="col-xs-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtInicio" name="txtInicio" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
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
		<!--
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selEstado">Estados</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selEstado" name="selEstado" class="form-control">
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<br />
		-->
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body" id="dvListaVentas">
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/reportes/winPagos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>