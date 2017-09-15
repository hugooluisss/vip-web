<div class="row">
	<div class="col-sm-3">
		<h1 class="page-header">Reporte de ventas</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selBazar">Bazar/mercado</label>
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
			<div class="col-xs-2 col-md-2 text-right">
				<label for="txtInicio">Inicio</label>
			</div>
			<div class="col-xs-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtInicio" name="txtInicio" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly/>
			</div>
			<div class="col-xs-2 col-md-2 col-md-offset-1 text-right">
				<label for="txtFin">Fin</label>
			</div>
			<div class="col-xs-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtFin" name="txtFin" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly/>
			</div>
		</div>
		<br />
		<!--
		<div class="row">
			<div class="col-xs-2 text-right">
				<label for="selEstado">Estados</label>
			</div>
			<div class="col-xs-10 text-right">
				<select id="selEstado" name="selEstado" class="form-control">
					{foreach from=$estados item="row"}
						<option value="{$row.idEstado}">{$row.nombre}</option>
					{/foreach}
				</select>
			</div>
		</div>
		<br />
		-->
		<div class="row">
			<div class="col-xs-12 text-right">
				<button id="btnBuscar" name="btnBuscar" class="btn btn-primary">Buscar</button>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body" id="dvListaVentas">
	</div>
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/reportes/winPagos.tpl"}