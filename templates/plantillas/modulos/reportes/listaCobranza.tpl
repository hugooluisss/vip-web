<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Comisión</th>
			<th>Ventas</th>
			<th>Comisión</th>
			<th>IVA</th>
			<th>Total</th>
			<th>Tarjeta</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr {if $row.openpay_cash eq ''}title="Sin cargar"{else}title="Cargado al cliente"{/if}>
				<td {if $row.openpay_cash eq ''}style="border-left: 3px solid red"{else}style="border-left: 3px solid green"{/if}>{$row.registro}</td>
				<td>{$row.inicio}</td>
				<td>{$row.fin}</td>
				<td class="text-right">{$row.comision} %</td>
				<td class="text-right">${($row.monto)|string_format:"%.2f"}</td>
				<td class="text-right">${($row.monto*($row.comision/100))|string_format:"%.2f"}</td>
				<td class="text-right">${($row.monto*($row.comision/100)*0.16)|string_format:"%.2f"}</td>
				<td class="text-right">${($row.monto*($row.comision/100)*1.16)|string_format:"%.2f"}</td>
				<td class="text-center">{$row.tarjeta}</td>
				<td class="text-right">
					{if $row.factura neq ''}
						<a href="{$row.factura}" download="{$row.factura}" class="btn btn-link">Descargar factura</a>
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>