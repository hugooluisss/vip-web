<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Reporte de invetarios</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selBazar">Bazar</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selBazar" name="selBazar" class="form-control">
					<option value="">Todos</option>
					{foreach from=$bazares item="row"}
						<option value="{$row.idBazar}">{$row.nombre}</option>
					{/foreach}
				</select>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body" id="dvLista">
	</div>
</div>

<div class="modal fade" id="winVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" producto="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Historial de ventas del producto</h4>
			</div>
			<div class="modal-body">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->