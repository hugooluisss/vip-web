<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Por entregar</th>
			{if $bazar eq ''}
			<th>Bazar/mercado</th>
			{/if}
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.fecha}</td>
				<td>
					<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}" onclick="javascript: return false;">{$row.folio}</a>
				</td>
				<td>{$row.cliente}</td>
				<td class="text-right">{$row.cantidad - $row.entregado}</td>
				{if $bazar eq ''}
				<td>
					<a href="puntoventa/{$row.idBazar}-bazar/" class="" role="button" action="ticket" title="Comprobante de venta"> {$row.bazar}</a>
				</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>