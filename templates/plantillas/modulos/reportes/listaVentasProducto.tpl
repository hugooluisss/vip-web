<table id="tblVentasProducto" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Vendidos</th>
			<th>Entregados</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.fecha}</td>
				<td>{$row.folio}</td>
				<td>{$row.cliente}</td>
				<td class="text-right">{$row.cantidad}</td>
				<td class="text-right">{$row.entregado}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}"><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>