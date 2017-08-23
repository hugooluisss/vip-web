<div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Tarjetahabiente</th>
					<th>Número <small>(últimos 4)</small></th>
					<th>Tipo</th>
					<th>Expira</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row->holder_name}</td>
						<td>{$row->card_number}</td>
						<td class="text-center">{$row->brand} <small class="text-info">{$row->type}</small></td>
						<td class="text-center">{$row->expiration_month} / {$row->expiration_year}</td>
						<td class="text-right">
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row->id}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>