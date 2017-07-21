<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Métodos de cobro</h1>
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
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipo" name="selTipo">
								{foreach from=$tipos item="row"}
									<option value="{$row.idTipoCobro}">{$row.nombre}</option>
								{/foreach}
							</select>
							<span class="help-block" title="El método de cobro es el medio utilizado por la empresa para cobrar al cliente y puede ser de varios tipos: Bancos, Caja, Virtual">¿Que es un método de cobro?</span>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDestino" class="col-lg-2">Destino</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtDestino" name="txtDestino">
							<span class="help-block">Personaliza tu método de cobro por ejemplo: "Bancomer -xxxx", "Clip xxx" o "Caja xxxx"</span>
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


<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Definición de íconos</h4>
			</div>
			<div class="modal-body">
				<button class="btn btn-success"><i class="fa fa-pencil"></i></button> Modificar<br /><br />
				<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->