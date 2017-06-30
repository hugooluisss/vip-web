<table id="tblOperaciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Código barras</th>
			<th>Descripción</th>
			<th>Cantidad</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$operaciones item="row"}
			<tr json='{$row.json}'>
				<td>{$row.fecha}</td>
				<td>{$row.codigoBorras}</td>
				<td>{$row.descripcion}</td>
				<td>{$row.cantidad}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>