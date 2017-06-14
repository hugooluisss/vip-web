<table id="tblVentas" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Folio</th>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr json='{$row.json}'>
				<td>{$row.folio}</td>
				<td>{$row.fecha}</td>
				<td>{$row.nombreCliente}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>