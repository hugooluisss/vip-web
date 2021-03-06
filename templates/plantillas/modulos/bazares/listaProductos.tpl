{if $select neq true}
<div class="box">
	<div class="box-body">
{/if}
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código Barras</th>
					<th>Código Interno</th>
					<th>Descripción</th>
					<th>Color</th>
					<th>Talla</th>
					<th>Existencia</th>
					<th>Precio</th>
					<th>Descuento</th>
					{if $select neq true}
					<th>&nbsp;</th>
					{/if}
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr json='{$row.json}'>
						<td>{$row.codigoBarras}</td>
						<td>{$row.codigoInterno}</td>
						<td>{$row.descripcion}</td>
						<td>{$row.color}</td>
						<td>{$row.talla}</td>
						<td class="text-right">{$row.inventario}</td>
						<td class="text-right">{$row.precio}</td>
						<td class="text-right">{$row.descuento} %</td>
						{if $select neq true}
						<td class="text-right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idProducto}"><i class="fa fa-times"></i></button>
						</td>
						{/if}
					</tr>
				{/foreach}
			</tbody>
		</table>
{if $select neq true}
	</div>
</div>
{/if}