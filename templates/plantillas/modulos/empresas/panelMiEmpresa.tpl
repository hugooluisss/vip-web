<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Mi empresa</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">	
			<div class="row">
				<div class="col-xs-12 text-center">
					<a href="#" data-toggle="modal" data-target="#winFotografia">
						<img src="repositorio/empresas/empresa{$empresa->getId()}.jpg" id="logotipo" onerror="javascript: $(this).prop('src', '{$PAGE.imagenes}no-camara.jpg')"/>
						<br />
						<small class="text-info">Click para cambiar</small>
					</a>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRazonSocial" class="col-sm-2">Razon social</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="{$empresa->getRazonSocial()}" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtSlogan" class="col-sm-2">Slogan</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtSlogan" name="txtSlogan" value="{$empresa->getSlogan()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2">Domicilio</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="{$empresa->getDireccion()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtExterno" class="col-sm-2">#Ext</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtExterno" name="txtExterno" value="{$empresa->getExterno()}"/>
				</div>
				<label for="txtInterno" class="col-sm-2 col-sm-offset-2">#Int</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtInterno" name="txtInterno" value="{$empresa->getInterno()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtColonia" class="col-sm-2">Colonia</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtColonia" name="txtColonia" value="{$empresa->getColonia()}"/>
				</div>
				<label for="txtMunicipio" class="col-sm-2 col-sm-offset-1">Municipio</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtMunicipio" name="txtMunicipio" value="{$empresa->getMunicipio()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCiudad" class="col-sm-2">Ciudad</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtCiudad" name="txtCiudad" value="{$empresa->getCiudad()}"/>
				</div>
				<label for="txtEstado" class="col-sm-2 col-sm-offset-1">Estado</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEstado" name="txtEstado" value="{$empresa->getEstado()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-sm-2">R. F. C.</label>
				<div class="col-sm-4">
					<input class="form-control" id="txtRFC" name="txtRFC" value="{$empresa->getRFC()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2">Correo electrónico</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEmail" name="txtEmail" value="{$empresa->getEmail()}"/>
				</div>
				<label for="txtTelefono" class="col-sm-2 col-sm-offset-1">Teléfono</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="{$empresa->getTelefono()}"/>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id" value="{$empresa->getId()}"/>
			<input type="hidden" id="activo" value="1"/>
		</div>
	</div>
</form>


<div class="modal fade" id="winFotografia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Actualizar logotipo de la empresa</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<p>Se sugiere el uso de imágenes en formato jpg con resolución de 255px por 255px</p>
				</div>
				<form id="upload" method="post" action="?mod=cempresas&action=uploadfile&empresa={$empresa->getId()}" enctype="multipart/form-data">
					<input type="file" name="upl" accept="image/jpg,image/jpeg"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>