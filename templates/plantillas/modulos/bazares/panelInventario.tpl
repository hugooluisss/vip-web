<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inventario</h1>
	</div>
</div>

<div class="btn-group  btn-group-xs">
	<button type="button" class="btn btn-success">Importar xls</button>
	<button type="button" class="btn btn-success">Exportar xls</button>
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
						<label for="txtCodigoBarras" class="col-md-2">Código Barras</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoBarras" name="txtCodigoBarras">
						</div>
						<label for="txtCodigoInterno" class="col-md-2">Código Interno</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoInterno" name="txtCodigoInterno">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtDescripcion" class="col-md-2">Descripción</label>
						<div class="col-md-10">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtColor" class="col-md-2">Color</label>
						<div class="col-md-2">
							<input class="form-control" id="txtColor" name="txtColor">
						</div>
						<label for="txtTalla" class="col-md-2">Talla</label>
						<div class="col-md-2">
							<input class="form-control" id="txtTalla" name="txtTalla">
						</div>
						<label for="txtUnidad" class="col-md-2">Unidad</label>
						<div class="col-md-2">
							<input class="form-control" id="txtUnidad" name="txtUnidad">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtPrecio" class="col-md-2">Precio</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPrecio" name="txtPrecio" type="number">
						</div>
						<label for="txtCosto" class="col-md-offset-1 col-md-2">Costo</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCosto" name="txtCosto" type="number">
						</div>
					</div>
					
					<div class="form-group">
						<label for="txtCosto" class="col-md-2">Existencias</label>
						<div class="col-md-3">
							<input class="form-control" id="txtExistencias" name="txtExistencias" type="number">
						</div>
						<label for="txtDescuento" class="col-md-offset-1 col-md-2">Descuento</label>
						<div class="col-md-3">
							<input class="form-control" id="txtDescuento" name="txtDescuento" type="number">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					<input type="hidden" id="bazar" value="{$bazar}"/>
				</div>
			</div>
		</form>
	</div>
</div>