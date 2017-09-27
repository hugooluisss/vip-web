<table id="tblVentas" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Folio</th>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>Estado</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr json='{$row.json}' style="border-left: 4px solid {$row.colorEstado}" title="{$row.nombreEstado}">
				<td style="border-left: 3px solid {$row.colorEstado}">{$row.folio}</td>
				<td>{$row.fecha}</td>
				<td>{$row.nombreCliente}</td>
				<td style="color: {$row.colorEstado}">{$row.nombreEstado}</td>
				<td style="text-align: right">
					{if $row.idEstado eq 1}
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
					{/if}
					{if $row.idEstado eq 2}
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-primary btn-xs" action="imprimir" title="Imprimir" datos='{$row.json}'><i class="fa fa-file-pdf-o"></i></button>
					<button type="button" class="btn btn-primary btn-xs" action="email" title="Enviar por email" datos='{$row.json}'><i class="fa fa-envelope-o"></i></button>
					{/if}
					{if $row.idEstado eq 3}
					<button type="button" class="btn btn-primary btn-xs" action="imprimir" title="Imprimir" datos='{$row.json}'><i class="fa fa-file-pdf-o"></i></button>
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>