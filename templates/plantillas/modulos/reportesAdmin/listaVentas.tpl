<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Estado</th>
			<th>Bazar</th>
			<th>Monto</th>
			<th>Monto pagos</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.fecha}</td>
				<td>
					<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}" onclick="javascript: return false;">{$row.folio}</a>
				</td>
				<td>{$row.estado}</td>
				<td>{$row.bazar}</td>
				<td class="text-right">$ {$row.total}</td>
				<td class="text-right">$ {$row.pagos}</td>
			</tr>
		{/foreach}
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4" class="text-right">Total</th>
			<th class="text-right">$ {$total}</th>
			<th class="text-right">$ {$totalPagos}</th>
		</tr>
		<tr class="text-success">
			<th colspan="5" class="text-right">Ventas cerradas</th>
			<th class="text-right">
				$ {$totalCerradas} <br />
				{if $totalCerradas > 0} 
					<button id="btnCobrar" name="btnCobrar" type="button" data-toggle="modal" data-target="#winOrdenCobro" class="btn btn-success">Cobrar comisión</button>
				{/if}
			</th>
		</tr>
	</tfoot>
</table>

<input type="hidden" id="totalCerradas" value="{$totalCerradas}" />