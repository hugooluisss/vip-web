<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tarjetas</h1>
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
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;" public="{$public_key}" merchant="{$merchant}">
			<div class="box">
				<div class="box-body">
					<div class="alert alert-info">
						<p>La(s) tarjeta(s) dadás de alta seran utilizadas al momento de generar el cargo por el uso de la plataforma</p>
					</div>
					<div class="row">
                        <div class="col-xs-6">
	                        <img src="{$PAGE.imagenes}/openpay/cards1.png" class="img-responsive" />
                        </div>
                        <div class="col-xs-6">
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
							<input type="text" id="txtNumero" name="txtNumero" maxlength="19" data-openpay-card="card_number" class="form-control">
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
								{for $foo=$year to $year+10}
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
					<!--
					<div class="row">
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="{$PAGE.imagenes}/conekta/Conekta.png" style="width: 100px;"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="{$PAGE.imagenes}/conekta/Visa.png" style="width: 100px"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="{$PAGE.imagenes}/conekta/MasterCard.png" style="width: 100px"></div>
						<div class="col-xs-6 col-sm-3 text-center"><img class="mx-auto d-block" src="{$PAGE.imagenes}/conekta/AmericanExpress.png" style="width: 100px"></div>
					</div>
					-->
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

<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Definición de íconos</h4>
			</div>
			<div class="modal-body">
				<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->