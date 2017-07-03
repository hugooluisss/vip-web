<div class="row">
	<div class="col-sm-3">
		<h1 class="page-header">Operaciones</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="selBazar" class="col-md-2 text-right">Bazar</label>
				<div class="col-md-10">
					<select class="form-control" id="selBazar" name="selBazar">
						{foreach from=$bazares item="row"}
							<option value="{$row.idBazar}" {if $bazar eq $row.idBazar}selected{/if}>{$row.nombre}</option>
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selTipo" class="col-md-2 text-right">Tipo de operación</label>
				<div class="col-md-10">
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
			<button type="submit" class="btn btn-info pull-right">Agregar</button>
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