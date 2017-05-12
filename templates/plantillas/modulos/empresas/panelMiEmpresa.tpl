<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">			
			<div class="form-group">
				<label for="txtRazonSocial" class="col-sm-4">Razon social</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="{$empresa->getRazonSocial()}" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtSlogan" class="col-sm-4">Slogan</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtSlogan" name="txtSlogan" value="{$empresa->getSlogan()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-4">Dirección</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="{$empresa->getDireccion()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-sm-4">Teléfono</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="{$empresa->getTelefono()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-sm-4">Correo electrónico</label>
				<div class="col-sm-5">
					<input class="form-control" id="txtEmail" name="txtEmail" value="{$empresa->getEmail()}"/>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
			<input type="hidden" id="activo" value="1"/>
		</div>
	</div>
</form>