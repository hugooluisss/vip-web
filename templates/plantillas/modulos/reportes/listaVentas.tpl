<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Monto</th>
			{if $bazar eq ''}
			<th>Bazar</th>
			{/if}
			
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.fecha}</td>
				<td>{$row.folio}</td>
				<td>{$row.cliente}</td>
				<td class="text-right">$ {$row.total}</td>
				{if $bazar eq ''}
				<td>{$row.bazar}</td>
				{/if}
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}"><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>