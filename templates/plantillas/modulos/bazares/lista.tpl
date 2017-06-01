<div class="box">
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button class="btn btn-xs btn-success" id="showAll">Todos</button>
			<button class="btn btn-xs btn-danger" id="hideInactive">Solo activos</button>
		</div>
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Inicio</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr activo="{$row.estado}">
						<td style="border-left: 2px solid {if $row.estado eq 1}blue{else}red{/if}">{$row.idBazar}</td>
						<td>{$row.nombre}</td>
						<td>{$row.inicio}</td>
						<td style="color: {if $row.estado eq 1}blue{else}red{/if}">{if $row.estado eq 1}Activo{else}Inactivo{/if}</td>
						<td style="text-align: right">
							<a href="inventario/{$row.idBazar}-bazar/" class="btn btn-primary" title="Inventario">I</a>
							
							<button type="button" class="btn btn-primary" title="Usuarios en el bazar" datos='{$row.json}' data-toggle="modal" data-target="#winUsuarios" identificador="{$row.idBazar}"><i class="fa fa-users"></i></button>
							
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idBazar}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>