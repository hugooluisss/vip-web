<div class="modal fade" id="winPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Pago</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						Método Pago
					</div>
					<div class="col-xs-12 col-sm-9">
						<select class="form-control" id="selMetodoPago" name="selMetodoPago">
							{foreach from=$metodosPago item="row"}
								<option value="{$row.idMetodo}">{$row.nombre}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						Monto
					</div>
					<div class="col-xs-12 col-sm-3">
						<input class="form-control" id="txtMonto" name="txtMonto" value="0" type="number" />
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->