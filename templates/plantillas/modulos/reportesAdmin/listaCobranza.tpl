<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Empresa</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Comisión</th>
			<th>Monto</th>
			<th>IdCargo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr {if $row.openpay_cash eq ''}title="Sin cargar"{else}title="Cargado al cliente"{/if}>
				<td {if $row.openpay_cash eq ''}style="border-left: 3px solid red"{else}style="border-left: 3px solid green"{/if}>{$row.registro}</td>
				<td>{$row.razonsocial}</td>
				<td>{$row.inicio}</td>
				<td>{$row.fin}</td>
				<td class="text-right">{$row.comision} %</td>
				<td class="text-right">$ {$row.monto}</td>
				<td class="text-center">{$row.openpay_cash}</td>
				<td class="text-right">
					{if $row.openpay_cash eq ''}
						<button action="cobrar" type="button" data-toggle="modal" data-target="#winOrdenCobro" class="btn btn-success" datos='{$row.json}'>Cobrar comisión</button>
					{else}
						<button action="factura" type="button" data-toggle="modal" data-target="#winFactura" class="btn btn-primary" datos='{$row.json}'>Subir factura</button>
						{if $row.factura neq ''}
							<a href="{$row.factura}" download="{$row.factura}" class="btn btn-link">Descargar factura</a>
						{/if}
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>