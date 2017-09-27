{if $informacionCompleta neq true}
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			{include file=$PAGE.rutaModulos|cat:"modulos/error/empresas.tpl"}
		</div>
	</div>
{else}
	{if count($bazares) == 0}
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6">
				{include file=$PAGE.rutaModulos|cat:"modulos/error/bazares.tpl"}
			</div>
		</div>
	{/if}
	{if count($metodosCobro) == 0}
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6">
				{include file=$PAGE.rutaModulos|cat:"modulos/error/metodosCobro.tpl"}
			</div>
		</div>
	{/if}
	{if $efectivo}
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				{include file=$PAGE.rutaModulos|cat:"modulos/error/efectivo.tpl"}
			</div>
		</div>
	{/if}
{/if}
{if $informacionCompleta and count($bazares) > 0 and count($metodosCobro) > 0}
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Venta</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<select class="form-control" id="selBazar" name="selBazar">
				{foreach from=$bazares item="row"}
					<option value="{$row.idBazar}" {if $row.idBazar eq $bazarCookie}selected{/if}>{$row.nombre}</option>
				{/foreach}
			</select>
		</div>
		<div class="col-xs-12 col-sm-8 text-right">
			<div class="btn-group btn-group-xs">
				<button class="btn btn-primary btnNuevaVenta">Nueva venta</button>
				<button class="btn btn-default" data-toggle="modal" data-target="#winVentas">Historial de ventas</button>
			</div>
		</div>
	</div>
	<br />
	<div class="box">
		<div class="box-body">
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">Folio</span>
						<input type="text" class="form-control" id="txtFolio" name="txtFolio" value="" readonly="true" title="Folio" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-sm-offset-6 text-right">
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">Fecha</span>
						<input type="date" class="form-control text-right" id="txtFecha" name="txtFecha" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly="true" placerholder="Fecha" title="Fecha" />
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-xs-12 text-right">
					<button class="btn btn-success btn-xs btnNuevoCliente" data-toggle="modal" data-target="#winAddCliente">Registrar cliente</button>
				</div>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Cliente</span>
				<input class="form-control" id="txtCliente" name="txtCliente" placeholder="Nombre del cliente" value="{$clienteDefecto.nombre}" identificador="{$clienteDefecto['idCliente']}" jsonDefault='{json_encode($clienteDefecto)}'>
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
							<div class="col-xs-6 col-sm-4 h5">Subtotal</div>
							<div class="col-xs-6 col-sm-8 h5 text-right" id="dvSubtotal"></div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-4 h5">Descuento (%)</div>
							<div class="col-xs-6 col-sm-3 col-sm-offset-5 h5 text-right">
								<input type="text" value="" class="form-control text-right" id="txtDescuento" name="txtDescuento"/>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-4 h4">Total</div>
							<div class="col-xs-6 col-sm-8 h4 text-right" id="dvTotal"></div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-4 h5">Pagos</div>
							<div class="col-xs-6 col-sm-8 h5 text-right" id="dvTotalPagos"></div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-4 h4">Saldo</div>
							<div class="col-xs-6 col-sm-8 h4 text-right" id="dvSaldo"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12" id="dvPagos">
						</div>
					</div>
					<div class="text-center">
						<button class="btn btn-primary" id="btnPagar">Registro de pagos</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="box">
				<div class="box-body">
					<div class="btn-group btn-group-justified">
						<div class="btn-group">
							<button class="btn btn-primary" id="btnGuardar">Guardar para despues / apartar</button>
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
	
	{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winProductos.tpl"}
	{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winClientes.tpl"}
	{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winPago.tpl"}
	{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winVentas.tpl"}
{/if}