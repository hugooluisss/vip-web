<div class="row">
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