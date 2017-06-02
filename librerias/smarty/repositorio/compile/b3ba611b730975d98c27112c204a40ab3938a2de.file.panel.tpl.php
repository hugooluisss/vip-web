<?php /* Smarty version Smarty-3.1.11, created on 2017-06-02 12:03:03
         compiled from "templates/plantillas/modulos/ventas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1496810297593053b41bc3a5-11811133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ba611b730975d98c27112c204a40ab3938a2de' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/panel.tpl',
      1 => 1496422913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1496810297593053b41bc3a5-11811133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593053b4209913_93809395',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593053b4209913_93809395')) {function content_593053b4209913_93809395($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 text-right">
		<div class="btn-group btn-group-xs">
			<button class="btn btn-primary btnNuevaVenta">Nueva venta</button>
		</div>
	</div>
</div>
<br />
<div class="box">
	<div class="box-body">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Cliente</span>
			<input class="form-control" id="txtCliente" name="txtCliente" placeholder="Nombre del cliente">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Producto</span>
			<input class="form-control" id="txtProducto" name="txtProducto" placeholder="Código de barras, código interno o descripción del producto">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
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
</div><?php }} ?>