<form role="form" id="frmCobro" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winOrdenCobro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cobro</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Concepto</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="txtConcepto" name="txtConcepto" maxlength="249" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Monto</label>
						<div class="col-lg-5">
							<input type="text" class="form-control text-right" id="txtMonto" name="txtMonto" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPorcentaje" class="col-lg-2">Porcentaje</label>
						<div class="col-lg-5">
							<div class="input-group">
								<input type="number" class="form-control text-right" id="txtPorcentaje" name="txtPorcentaje" value="5"/>
								<span class="input-group-addon" id="basic-addon2">%</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Total a cobrar</label>
						<div class="col-lg-5">
							<input type="text" class="form-control text-right" id="txtCobro" name="txtCobro" readonly="true" disabled="true"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear orden</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form>