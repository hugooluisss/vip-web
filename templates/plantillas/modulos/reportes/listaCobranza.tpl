<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Comisión</th>
			<th>Monto</th>
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
				<td class="text-right">$ {$row.monto}</td>
				<td class="text-center">{$row.tarjeta}</td>
				<td class="text-right">
					{if $row.factura neq ''}
						<a href="{$row.factura}" target="_blank" class="btn btn-success" title="Descargar factura"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>