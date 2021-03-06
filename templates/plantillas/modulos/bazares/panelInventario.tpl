{if $informacionCompleta neq true}
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			{include file=$PAGE.rutaModulos|cat:"modulos/error/empresas.tpl"}
		</div>
	</div>
{else}
	{if $totalBazares}
	<div class="row">
		<div class="col-sm-3">
			<h1 class="page-header">Carga de inventario</h1>
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
			<div class="btn-group btn-group-xs pull-left">
				<button class="btn btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
			<div class="btn-group btn-group-xs pull-right">
				<div class="btn-group" role="group" aria-label="...">
					<button type="button" class="btn btn-success" id="btnExportar"><i class="fa fa-download" aria-hidden="true"></i> Exportar xls</button>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#winUpload"><i class="fa fa-upload" aria-hidden="true"></i> Importar/Actualiza inventario xls</button>
					<button type="button" class="btn btn-primary" id="btnPlantilla"><i class="fa fa-download" aria-hidden="true"></i> Descargar plantilla</button>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Definición de íconos</h4>
				</div>
				<div class="modal-body">
					<button class="btn btn-success"><i class="fa fa-pencil"></i></button> Modificar<br /><br />
					<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	
	<div class="row">
		<div class="col-xs-12">
			<ul id="panelTabs" class="nav nav-tabs ">
			  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
			  <li><a data-toggle="tab" href="#add">Agregar</a></li>
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
						<div class="form-group">
							<label for="txtMarca" class="col-md-2 text-right">Familia</label>
							<div class="col-md-2 text-right">
								<input class="form-control" id="txtMarca" name="txtMarca">
							</div>
						</div>
						<hr />
						<div class="form-group">
							<label for="txtPrecio" class="col-md-2 text-right">Precio público</label>
							<div class="col-md-3">
								<input class="form-control" id="txtPrecio" name="txtPrecio" type="number">
							</div>
							<!--
							<label for="txtCosto" class="col-md-offset-1 col-md-2 text-right">Costo</label>
							<div class="col-md-3">
								<input class="form-control" id="txtCosto" name="txtCosto" type="number" value="0">
							</div>
							-->
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
						
						<div class="form-group">
							<label for="txtObservacion" class="col-md-2 text-right">Observaciones</label>
							<div class="col-md-10">
								<textarea rows="5" class="form-control" id="txtObservacion" name="txtObservacion"></textarea>
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
					<h4 class="modal-title">Subir archivo para Importar/actualizar inventario</h4>
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
	
	{else}
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-sm-6">
				{include file=$PAGE.rutaModulos|cat:"modulos/error/bazares.tpl"}
			</div>
		</div>
	{/if}
{/if}