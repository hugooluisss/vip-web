<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Código Barras</th>
			<th>Código Interno</th>
			<th>Descripción</th>
			<th>Color</th>
			<th>Talla</th>
			<th>Existencia inicial</th>
			<th>Ventas</th>
			<th>Pedidos</th>
			<th>Inventario actual</th>
			<th>Precio</th>
			{if $bazar eq ''}
				<th>Bazar/mercado</th>
			{/if}
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.codigoBarras}</td>
				<td>{$row.codigoInterno}</td>
				<td>{$row.descripcion}</td>
				<td>{$row.color}</td>
				<td>{$row.talla}</td>
				<td class="text-right">{$row.existencias}</td>
				<td class="text-right">{$row.vendidos}</td>
				<td class="text-right">{$row.pedidos}</td>
				<td class="text-right">{$row.inventario}</td>
				<td class="text-right">{$row.precio}</td>
				{if $bazar eq ''}
					<td>
						<a href="productos/{$row.idBazar}-bazar/" class="" role="button" action="ticket" title="Comprobante de venta"> {$row.bazar}</a>
					</td>
				{/if}
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="ventas" title="Comprobante de venta" datos='{$row.json}' idProducto="{$row.idProducto}" data-toggle="modal" data-target="#winVentas"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>