<table id="tblPagos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Método de pago</th>
			<th>Metodo de cobro</th>
			<th>Referencia</th>
			<th>Saldo</th>
			<th>Pago</th>
			<!--
			<th>&nbsp;</th>
			-->
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.fecha}</td>
				<td>{$row.metodoPago}</td>
				<td>{$row.metodoCobro}</td>
				<td>{$row.referencia}</td>
				<td class="text-right">$ {$row.saldo}</td>
				<td class="text-right">$ {$row.monto}</td>
				<!--
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="ventas" title="Comprobante de venta" datos='{$row.json}' idProducto="{$row.idProducto}" data-toggle="modal" data-target="#winVentas"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
				</td>
				-->
			</tr>
		{/foreach}
	</tbody>
	<tfoot>
		<tr>
			<th colspan="5" class="text-right">Saldo actual</th>
			<th class="text-right">$ {$saldo}</th>
			<!--<th>&nbsp;</th>-->
		</tr>
	</tfoot>
</table>