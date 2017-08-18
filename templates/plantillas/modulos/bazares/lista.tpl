<div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-success" id="showAll">Todos</button>
				<button class="btn btn-xs btn-danger" id="hideInactive">Solo activos</button>
			</div>
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Inicia</th>
					<th>Termina</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr activo="{$row.estado}">
						<td style="border-left: 2px solid {if $row.estado eq 1}blue{else}red{/if}">{$row.nombre}</td>
						<td>{$row.inicio}</td>
						<td>{$row.fin}</td>
						<td class="text-center" style="color: {if $row.estado eq 1}blue{else}red{/if}">{if $row.estado eq 1}Activo{else}Inactivo{/if}</td>
						<td class="text-right">
							<a href="productos/{$row.idBazar}-bazar/" class="btn btn-primary" title="Catálogo de productos"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
							
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