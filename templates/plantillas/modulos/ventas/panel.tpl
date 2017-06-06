<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Venta</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-4">
		<select class="form-control" id="selBazar" name="selBazar">
			{foreach from=$bazares item="row"}
				<option value="{$row.idBazar}">{$row.nombre}</option>
			{/foreach}
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
				<input type="date" class="form-control text-right" id="txtFecha" name="txtFecha" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly="true" placerholder="Fecha" />
			</div>
		</div>
		<br />
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Cliente</span>
			<input class="form-control" id="txtCliente" name="txtCliente" placeholder="Nombre del cliente">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#winClientes"><i class="fa fa-search" aria-hidden="true"></i></button>
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

{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winProductos.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winClientes.tpl"}