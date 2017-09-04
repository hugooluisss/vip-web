<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
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
			<tr>
				<td>{$row.registro}</td>
				<td>{$row.inicio}</td>
				<td>{$row.fin}</td>
				<td class="text-right">{$row.comision} %</td>
				<td class="text-right">$ {$row.monto}</td>
				<td class="text-center">{$row.openpay_cash}</td>
				<td class="text-right">
					{if $row.openpay_cash eq ''}
						<button action="cobrar" type="button" data-toggle="modal" data-target="#winOrdenCobro" class="btn btn-success" datos='{$row.json}'>Cobrar comisión</button>
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>