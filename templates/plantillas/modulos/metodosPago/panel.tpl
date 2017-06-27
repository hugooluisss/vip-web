<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Métodos de pago</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
							<span class="help-block" title="El método de pago es el método utilizado por el cliente para pagar a la empresa y pueden ser de varios tipos: Tarjeta de Crédito, Tarjeta de débito, Transferencia, Efectivo">¿Que es un método de pago?</span>
						</div>
					</div>
					<div class="form-group">
						<label for="selMetodoCobro" class="col-lg-2">Metodo de cobro</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipoCobro" name="selTipoCobro">
								{foreach from=$tipos item="row"}
									<option value="{$row.idTipoCobro}">{$row.nombre}</option>
								{/foreach}
							</select>
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