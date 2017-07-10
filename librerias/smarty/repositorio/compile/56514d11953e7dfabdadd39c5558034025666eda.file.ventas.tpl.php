<?php /* Smarty version Smarty-3.1.11, created on 2017-07-10 10:08:13
         compiled from "templates/plantillas/modulos/reportesAdmin/ventas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1446187458596393f51243f5-98435692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56514d11953e7dfabdadd39c5558034025666eda' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/ventas.tpl',
      1 => 1499699291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1446187458596393f51243f5-98435692',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_596393f522a039_23233305',
  'variables' => 
  array (
    'empresas' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_596393f522a039_23233305')) {function content_596393f522a039_23233305($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/vip-web/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Reporte de ventas por empresa</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selEmpresa">Empresa</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selEmpresa" name="selEmpresa" class="form-control">
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empresas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
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
			<div class="col-xs-5 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtInicio" name="txtInicio" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" readonly/>
			</div>
			<div class="col-xs-2 col-md-2 col-md-offset-1 text-right">
				<label for="txtFin">Fin</label>
			</div>
			<div class="col-xs-5 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtFin" name="txtFin" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" readonly/>
			</div>
		</div>
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
</div><?php }} ?>