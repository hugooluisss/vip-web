<br />
<div class="row">
	<div class="col-xs-12 text-right">
		<button type="button" id="btnImportar" class="btn btn-danger"> Importar</button>
	</div>
</div>
<input type="hidden" id="jsonImportar" value='{$json}' />
<br />
<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>CB</th>
			<th>CI</th>
			<th>Descripción</th>
			<th>Color/Talla/Unidad</th>
			<!--<th>Costo</th>-->
			<th>Descuento</th>
			<th>Precio</th>
			<th>Existencias</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.codigoBarras}</td>
				<td>{$row.codigoInterno}</td>
				<td>{$row.descripcion}</td>
				<td>{$row.color}/{$row.talla}/{$row.unidad}</td>
				<!--<td class="text-right">{$row.costo}</td>-->
				<td class="text-right">{$row.descuento}</td>
				<td class="text-right">{$row.precio}</td>
				<td class="text-right">{$row.existencias}</td>
			</tr>
		{/foreach}
	</tbody>
</table>