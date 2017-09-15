<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Cobranza</h1>
	</div>
</div>

<div class="btn-toolbar" role="toolbar" aria-label="...">
	<div class="btn-group" role="group" aria-label="...">
		<button class="btn btn-xs btn-warning" id="btnGenerar">Generar cobranza</button>
	</div>
</div>
<br />
<div class="panel panel-default">
	<div class="panel-body" id="dvLista">
		
	</div>
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/reportesAdmin/winOrden.tpl"}

<input type="hidden" id="merchant" value="{$openpay.id}" />
<input type="hidden" id="public" value="{$openpay.key_public}" />

{include file=$PAGE.rutaModulos|cat:"modulos/reportesAdmin/winUpFactura.tpl"}