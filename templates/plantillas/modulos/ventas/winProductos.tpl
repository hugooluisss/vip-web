<div class="modal fade" id="winProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Productos</h4>
			</div>
			<div class="modal-body">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="winNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Agregar producto</h4>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="txtCodigo" class="col-md-2 text-right">Código</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCodigo" name="txtCodigo">
						</div>
					</div>
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
				</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->