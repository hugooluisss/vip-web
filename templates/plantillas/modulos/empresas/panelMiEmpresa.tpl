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
						{assign var="img" value="repositorio/empresas/empresa"|cat:$empresa->getId()|cat:".jpg"} 

						{if file_exists($img)}
						<img src="repositorio/empresas/empresa{$empresa->getId()}.jpg?{rand()}" id="logotipo" style="height: 100px;"/>
						{else}
						<img src="{$PAGE.imagenes}no-camara.jpg" id="logotipo" style="height: 100px;"/>
						{/if}
						<br />
						<small class="text-info">Click para cambiar el logotipo de la empresa</small>
					</a>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRazonSocial" class="col-sm-2">Razon social *</label>
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
				<label for="txtMarca" class="col-sm-2">Marca</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtMarca" name="txtMarca" value="{$empresa->getMarca()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2">Domicilio fiscal *</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="{$empresa->getDireccion()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtExterno" class="col-sm-2">#Ext *</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtExterno" name="txtExterno" value="{$empresa->getExterno()}"/>
				</div>
				<label for="txtInterno" class="col-sm-2 col-sm-offset-2">#Int</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtInterno" name="txtInterno" value="{$empresa->getInterno()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtColonia" class="col-sm-2">Colonia *</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtColonia" name="txtColonia" value="{$empresa->getColonia()}"/>
				</div>
				<label for="txtMunicipio" class="col-sm-2 col-sm-offset-1">Municipio *</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtMunicipio" name="txtMunicipio" value="{$empresa->getMunicipio()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCiudad" class="col-sm-2">Ciudad *</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtCiudad" name="txtCiudad" value="{$empresa->getCiudad()}"/>
				</div>
				<label for="txtEstado" class="col-sm-2 col-sm-offset-1">Estado *</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEstado" name="txtEstado" value="{$empresa->getEstado()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-sm-2">R. F. C. *</label>
				<div class="col-sm-4">
					<input class="form-control" id="txtRFC" name="txtRFC" value="{$empresa->getRFC()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2">Correo electrónico para recibir facturas</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEmail" name="txtEmail" value="{$empresa->getEmail()}"/>
				</div>
				<label for="txtTelefono" class="col-sm-2 col-sm-offset-1">Teléfono *</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="{$empresa->getTelefono()}"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-sm-2">Comisión</label>
				<div class="col-sm-4">
					{$empresa->getComision()} %
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


<form action="#" id="frmTarjeta" method="post" class="form-horizontal" onsubmit="javascript: return false;" style="display: none" merchant="{$openpay.id}" public="{$openpay.key_public}" produccion="{$openpay.produccion}">
	<div class="box">
		<div class="box-body">
			{if $tarjeta->card_number == ''}
				<div class="alert alert-danger">
					<p>La tarjeta registrada será utilizada al momento de generar el cargo por el uso de la plataforma</p>
				</div>
			{else}
				<div class="alert alert-info">
					<p>Actualmente tenemos registrada la tarjeta con número {$tarjeta->card_number}. Si deseas cambiarla actualiza la información</p>
				</div>
			{/if}
			<div class="row">
		        <div class="col-sm-6 col-xs-12">
		            <img src="{$PAGE.imagenes}/openpay/cards1.png" class="img-responsive" />
		        </div>
		        <div class="col-sm-6 col-xs-12">
		            <img src="{$PAGE.imagenes}/openpay/cards2.png" class="img-responsive" />
		        </div>
		    </div>
		    <br /><br />
			<div class="form-group">
				<label for="" class="col-lg-2">Nombre del tarjetahabiente</label>
				<div class="col-lg-4">
					<input type="text" id="txtTarjetahabiente" name="txtTarjetahabiente" data-openpay-card="holder_name" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-lg-2">Número de tarjeta</label>
				<div class="col-lg-4">
					<input type="text" id="txtNumero" name="txtNumero" maxlength="16" data-openpay-card="card_number" class="form-control">
					<span class="text-success ayudaNumber"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-lg-2">CVC</label>
				<div class="col-lg-2">
					<input type="text" id="txtCVC" name="txtCVC" size="3" data-openpay-card="cvv2" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-lg-2">Fecha de expiración</label>
				<div class="col-lg-3">
					<select id="selMes" name="selMes" data-openpay-card="expiration_month" class="form-control">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>
				<div class="col-lg-3">
					<select id="selAnio" name="selAnio" data-openpay-card="expiration_year" class="form-control">
						{for $foo=date("Y") to date("Y")+10}
							<option value="{$foo}">{$foo}</option>
						{/for}
					</select>
				</div>
			</div>
			<br />
			<br />
			<div class="row">
				<div class="col-xs-12 text-right">
					<img src="{$PAGE.imagenes}/openpay/openpay.png" />
					<img src="{$PAGE.imagenes}/openpay/radio_on.png" />
					<img src="{$PAGE.imagenes}/openpay/security.png" />
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
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