{if $select neq true}
<div class="box">
	<div class="box-body">
{/if}
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Razón Social</th>
					{if $select neq true}
					<th>&nbsp;</th>
					{/if}
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr json='{$row.json}'>
						<td>{$row.idCliente}</td>
						<td>{$row.nombre}</td>
						<td>{$row.razonsocial}</td>
						{if $select neq true}
						<td style="text-align: right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idCliente}"><i class="fa fa-times"></i></button>
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