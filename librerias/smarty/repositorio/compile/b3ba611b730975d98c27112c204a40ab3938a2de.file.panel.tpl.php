<?php /* Smarty version Smarty-3.1.11, created on 2017-06-20 09:46:52
         compiled from "templates/plantillas/modulos/ventas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162072958459448df9a9a2a9-18731015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ba611b730975d98c27112c204a40ab3938a2de' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/panel.tpl',
      1 => 1497965910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162072958459448df9a9a2a9-18731015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448df9b62730_18210028',
  'variables' => 
  array (
    'bazares' => 0,
    'row' => 0,
    'clienteDefecto' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448df9b62730_18210028')) {function content_59448df9b62730_18210028($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/vip-web/librerias/smarty/plugins/modifier.date_format.php';
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
			<button class="btn btn-default" data-toggle="modal" data-target="#winVentas">Historial de ventas</button>
			<button class="btn btn-success btnNuevoCliente" data-toggle="modal" data-target="#winAddCliente">Registrar cliente</button>
		</div>
	</div>
</div>
<br />
<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-4 col-sm-3">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">Folio</span>
					<input type="text" class="form-control" id="txtFolio" name="txtFolio" value="" readonly="true" title="Folio" />
				</div>
			</div>
			<div class="col-xs-4 col-xs-offset-4 col-sm-3 col-sm-offset-6 text-right">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">Fecha</span>
					<input type="date" class="form-control text-right" id="txtFecha" name="txtFecha" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" readonly="true" placerholder="Fecha" title="Fecha" />
				</div>
			</div>
		</div>
		<br />
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Cliente</span>
			<input class="form-control" id="txtCliente" name="txtCliente" placeholder="Nombre del cliente" value="<?php echo $_smarty_tpl->tpl_vars['clienteDefecto']->value['nombre'];?>
" identificador="<?php echo $_smarty_tpl->tpl_vars['clienteDefecto']->value['idCliente'];?>
" jsonDefault='<?php echo json_encode($_smarty_tpl->tpl_vars['clienteDefecto']->value);?>
'>
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#winClientes"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button" id="setClienteDefecto">D</button>
			</span>
		</div>
		<br />
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12 text-right">
				<div class="btn-group btn-group-xs">
					<button class="btn btn-primary btnNuevoProducto" data-toggle="modal" data-target="#winNuevoProducto">Nuevo producto</button>
				</div>
			</div>
		</div>
		<br />
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
	<div class="col-sm-6">
		<div class="box">
			<div class="box-body">
				Comentarios
				<textarea id="txtComentario" name="txtComentario" class="form-control" rows="5"></textarea>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="box">
			<div class="box-body">
				<div class="alert alert-success">
					<div class="row">
						<div class="col-xs-4 h5">Subtotal</div>
						<div class="col-xs-8 h5 text-right" id="dvSubtotal"></div>
					</div>
					<div class="row">
						<div class="col-xs-4 h5">Descuento(%)</div>
						<div class="col-xs-3 col-xs-offset-5 h5 text-right">
							<input type="text" value="" class="form-control text-right" id="txtDescuento" name="txtDescuento"/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 h4">Total</div>
						<div class="col-xs-8 h4 text-right" id="dvTotal"></div>
					</div>
					<div class="row">
						<div class="col-xs-4 h5">Pagos</div>
						<div class="col-xs-8 h5 text-right" id="dvTotalPagos"></div>
					</div>
					<div class="row">
						<div class="col-xs-4 h4">Saldo</div>
						<div class="col-xs-8 h4 text-right" id="dvSaldo"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12" id="dvPagos">
					</div>
				</div>
				<div class="text-center">
					<button class="btn btn-primary" id="btnPagar">Guardar y pagar</button>
				</div>
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
						<button class="btn btn-primary" id="btnGuardar">Guardar</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-danger" id="btnCancelar">Cancelar</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-success btnCerrar">Cerrar y enviar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winClientes.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winPago.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winVentas.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>