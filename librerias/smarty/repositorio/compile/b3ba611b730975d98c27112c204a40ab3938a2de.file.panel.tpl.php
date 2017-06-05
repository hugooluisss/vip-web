<?php /* Smarty version Smarty-3.1.11, created on 2017-06-05 12:15:49
         compiled from "templates/plantillas/modulos/ventas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1496810297593053b41bc3a5-11811133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ba611b730975d98c27112c204a40ab3938a2de' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/panel.tpl',
      1 => 1496682948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1496810297593053b41bc3a5-11811133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593053b4209913_93809395',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593053b4209913_93809395')) {function content_593053b4209913_93809395($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/vip-web/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-4">
		<select class="form-control" id="selBazar" name="selBazar">
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
	<div class="col-xs-12 col-sm-8 text-right">
		<div class="btn-group btn-group-xs">
			<button class="btn btn-primary btnNuevaVenta">Nueva venta</button>
		</div>
	</div>
</div>
<br />
<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-8 col-sm-3 col-sm-offset-9 text-right">
				<input type="date" class="form-control text-right" id="txtFecha" name="txtFecha" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" readonly="true" placerholder="Fecha" />
			</div>
		</div>
		<br />
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Cliente</span>
			<input class="form-control" id="txtCliente" name="txtCliente" placeholder="Nombre del cliente">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
		</div>
		<br />
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Producto</span>
			<input class="form-control" id="txtProducto" name="txtProducto" placeholder="Código de barras, código interno o descripción del producto">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#winProductos"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-body" id="dvProductos"></div>
</div>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="alert alert-success">
			<div class="row">
				<div class="col-xs-4 h3">Total</div>
				<div class="col-xs-8 h3 text-right" id="dvTotal"></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="box">
			<div class="box-body">
				<div class="btn-group btn-group-justified">
					<div class="btn-group">
						<button class="btn btn-primary">Pagar</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-secondary btnNuevaVenta">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>