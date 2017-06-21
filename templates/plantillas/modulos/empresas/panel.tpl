<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtRazonSocial" class="col-sm-2">Razon social</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtSlogan" class="col-sm-2">Slogan</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtSlogan" name="txtSlogan" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-2">Domicilio</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtDireccion" name="txtDireccion" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtExterno" class="col-sm-2">#Ext</label>
						<div class="col-sm-2">
							<input class="form-control" id="txtExterno" name="txtExterno" value=""/>
						</div>
						<label for="txtInterno" class="col-sm-2 col-sm-offset-2">#Int</label>
						<div class="col-sm-2">
							<input class="form-control" id="txtInterno" name="txtInterno" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtColonia" class="col-sm-2">Colonia</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtColonia" name="txtColonia" value=""/>
						</div>
						<label for="txtMunicipio" class="col-sm-2 col-sm-offset-1">Municipio</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtMunicipio" name="txtMunicipio" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCiudad" class="col-sm-2">Ciudad</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtCiudad" name="txtCiudad" value=""/>
						</div>
						<label for="txtEstado" class="col-sm-2 col-sm-offset-1">Estado</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtEstado" name="txtEstado" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtRFC" class="col-sm-2">R. F. C.</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtRFC" name="txtRFC" value=""/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-2">Correo electrónico</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtEmail" name="txtEmail" value=""/>
						</div>
						<label for="txtTelefono" class="col-sm-2 col-sm-offset-1">Teléfono</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtTelefono" name="txtTelefono" value=""/>
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