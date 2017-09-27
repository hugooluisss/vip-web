<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Reporte de ventas por empresa</h1>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-2 col-sm-2 text-right">
				<label for="selEmpresa">Empresa</label>
			</div>
			<div class="col-xs-10 col-sm-6 text-right">
				<select id="selEmpresa" name="selEmpresa" class="form-control" multiple>
					{foreach from=$empresas item="row"}
						<option value="{$row.idEmpresa}">{$row.razonsocial}</option>
					{/foreach}
				</select>
			</div>
			<div class="col-xs-offset-2 col-xs-10 col-sm-offset-0 col-sm-4">
				<button id="btnSelAll" class="btn btn-block btn-success btn-xs">Seleccionar todas</button>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-2 col-sm-2 text-right">
				<label for="selEmpresa">Solo las cerradas</label>
			</div>
			<div class="col-xs-10 col-sm-6">
				<input type="checkbox" value="1" id="chkCerradas" checked="true">
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 text-right">
				<label for="txtInicio">Inicio</label>
			</div>
			<div class="col-xs-5 col-sm-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtInicio" name="txtInicio" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly/>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-1 text-right">
				<label for="txtFin">Fin</label>
			</div>
			<div class="col-xs-5 col-sm-4 col-md-3">
				<input type="date" placeholder="Y-m-d" class="form-control" id="txtFin" name="txtFin" value="{$smarty.now|date_format:"%Y-%m-%d"}" readonly/>
			</div>
		</div>
		<br /><br />
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

{include file=$PAGE.rutaModulos|cat:"modulos/reportesAdmin/winOrden.tpl"}

<input type="hidden" id="merchant" value="{$openpay.id}" />
<input type="hidden" id="public" value="{$openpay.key_public}" />