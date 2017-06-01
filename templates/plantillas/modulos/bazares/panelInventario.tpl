<div class="row">
	<div class="col-sm-3">
		<h1 class="page-header">Inventario del bazar </h1>
	</div>
	<div class="col-sm-4 page-header">
		<select class="form-control" id="bazar" name="bazar">
			{foreach from=$lista item="row"}
				<option value="{$row.idBazar}" {if $bazar eq $row.idBazar}selected{/if}>{$row.nombre}</option>
			{/foreach}
		</select>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="btn-group btn-group-xs pull-right">
			<button type="button" class="btn btn-success" id="btnExportar"><i class="fa fa-download" aria-hidden="true"></i> Exportar xls</button>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#winUpload"><i class="fa fa-upload" aria-hidden="true"></i> Importar xls</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul id="panelTabs" class="nav nav-tabs ">
		  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
		  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
		</ul>
	</div>
</div>
<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtCodigoBarras" class="col-md-2 text-right">Código Barras</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoBarras" name="txtCodigoBarras">
						</div>
						<label for="txtCodigoInterno" class="col-md-2 text-right">Código Interno</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoInterno" name="txtCodigoInterno">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtDescripcion" class="col-md-2 text-right">Descripción</label>
						<div class="col-md-10">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtColor" class="col-md-2 text-right">Color</label>
						<div class="col-md-2 text-right">
							<input class="form-control" id="txtColor" name="txtColor">
						</div>
						<label for="txtTalla" class="col-md-2 text-right">Talla</label>
						<div class="col-md-2 text-right">
							<input class="form-control" id="txtTalla" name="txtTalla">
						</div>
						<label for="txtUnidad" class="col-md-2 text-right">Unidad</label>
						<div class="col-md-2 text-right">
							<input class="form-control" id="txtUnidad" name="txtUnidad">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtPrecio" class="col-md-2 text-right">Precio público</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPrecio" name="txtPrecio" type="number">
						</div>
						<label for="txtCosto" class="col-md-offset-1 col-md-2 text-right">Costo</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCosto" name="txtCosto" type="number" value="0">
						</div>
					</div>
					
					<div class="form-group">
						<label for="txtCosto" class="col-md-2 text-right">Existencia</label>
						<div class="col-md-3">
							<input class="form-control" id="txtExistencias" name="txtExistencias" type="number">
						</div>
						<label for="txtDescuento" class="col-md-offset-1 col-md-2 text-right">Descuento</label>
						<div class="col-md-3">
							<div class="input-group">
								<input class="form-control" id="txtDescuento" name="txtDescuento" type="number" aria-describedby="basic-addon1">
								<span class="input-group-addon" id="basic-addon1">%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>


<div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Subir archivo</h4>
			</div>
			<div class="modal-body">
				<form id="upload" method="post" action="?mod=cproductos&action=uploadfile" enctype="multipart/form-data">
					<input type="file" name="upl" />
				</form>
				
				<div class="row">
					<div class="col-xs-12" id="dvProductsImport">
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->