<form role="form" id="frmPago" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Pago</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selMetodoPago" class="col-sm-3">Método de pago</label>
						<div class="col-sm-9">
							<select class="form-control" id="selMetodoPago" name="selMetodoPago">
								{foreach from=$metodosPago item="row"}
									<option value="{$row.idMetodo}">{$row.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtMonto" class="col-sm-3">Monto</label>
						<div class="col-sm-3">
							<input class="form-control text-right" id="txtMonto" name="txtMonto" value="0" type="number" />
							<input id="montoMaximo" name="montoMaximo" value="0" type="hidden" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtReferencia" class="col-sm-3">Referencia</label>
						<div class="col-sm-9">
							<input class="form-control" id="txtReferencia" name="txtReferencia" value="" type="text" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>