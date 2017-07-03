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
				<td>{$row.codigoBarras}</td>
				<td>{$row.descripcion}</td>
				<td class="text-right">
					<input type="number" cantidad="{$row.cantidad}" class="form-control text-right" value="{$row.cantidad}" identificador="{$row.idOperacion}"/>
				</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idOperacion}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>