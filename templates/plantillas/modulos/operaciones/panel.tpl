{if $informacionCompleta neq true}
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			{include file=$PAGE.rutaModulos|cat:"modulos/error/empresas.tpl"}
		</div>
	</div>
{else}
	{if $totalBazares}
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header">Entradas y salidas de productos</h1>
		</div>
	</div>
	
	<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					<label for="selBazar" class="col-md-2 text-right" style="padding-top: 5px">Bazar</label>
					<div class="col-md-4">
						<select class="form-control" id="selBazar" name="selBazar">
							{foreach from=$bazares item="row"}
								<option value="{$row.idBazar}" {if $bazar eq $row.idBazar}selected{/if}>{$row.nombre}</option>
							{/foreach}
						</select>
					</div>
					<label for="selTipo" class="col-md-2 text-right" style="padding-top: 5px">Tipo de operación</label>
					<div class="col-md-4">
						<select class="form-control" id="selTipo" name="selTipo">
							{foreach from=$tipos item="row"}
								<option value="{$row.idTipo}">{$row.nombre}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Producto</span>
					<input class="form-control" id="txtProducto" name="txtProducto" placeholder="Código de barras, código interno o descripción del producto">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#winProductos"><i class="fa fa-search" aria-hidden="true"></i></button>
					</span>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-info pull-right">Guardar</button>
				<input type="hidden" id="id"/>
			</div>
		</div>
	</form>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-body" id="dvLista">
				</div>
			</div>
		</div>
	</div>
	
	{include file=$PAGE.rutaModulos|cat:"modulos/ventas/winProductos.tpl"}
	{else}
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6">
				{include file=$PAGE.rutaModulos|cat:"modulos/error/bazares.tpl"}
			</div>
		</div>
	{/if}
	
	
	<div class="modal fade" id="winNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Agregar producto</h4>
				</div>
				<div class="modal-body">
					<form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
						<!--
						<div class="form-group">
							<label for="txtCodigo" class="col-md-2 text-right">Código</label>
							<div class="col-md-3">
								<input class="form-control" id="txtCodigo" name="txtCodigo">
							</div>
						</div>
						-->
						<div class="form-group">
							<label for="txtDescripcion" class="col-md-2 text-right">Descripción</label>
							<div class="col-md-10">
								<input class="form-control" id="txtDescripcion" name="txtDescripcion">
							</div>
						</div>
						<div class="form-group">
							<label for="txtPrecio" class="col-md-2 text-right">Precio público</label>
							<div class="col-md-3">
								<input class="form-control" id="txtPrecio" name="txtPrecio" type="number" value="0">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
								<button type="submit" class="btn btn-info pull-right">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<input id="codigoBarras" name="codigoBarras" type="hidden" value="">
{/if}