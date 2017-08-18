<form role="form" id="frmCobro" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winPagoOrden" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" orden="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cobro</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="" class="col-lg-2">Orden</label>
						<div class="col-lg-10" campo="id"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Monto</label>
						<div class="col-lg-10" campo="amount"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-lg-2">Creada el</label>
						<div class="col-lg-10" campo="created_at"></div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Pagar con </label>
						<div class="col-lg-10">
							<select id="selTarjeta" name="selTarjeta" class="form-control">
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Realizar cargo</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>