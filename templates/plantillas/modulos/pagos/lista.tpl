<table id="tblVentas" class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Metodo</th>
			<th>Monto</th>
			<th>Referencia</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr json='{$row.json}'>
				<td>{$row.fecha}</td>
				<td>{$row.nombrePago}</td>
				<td class="text-right">{$row.monto|number_format:2:".":","}</td>
				<td>{$row.referencia}</td>
				<td class="text-center">
					<button type="button" class="btn btn-danger btn-xs" action="eliminarPago" title="Eliminar pago" identificador='{$row.idPago}'><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>

<input type="hidden" id="deuda" name="deuda" value="{$total}" />