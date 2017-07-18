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
					<th>Tipo</th>
					<th>Destino</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.nombretipo}</td>
						<td>{$row.destino}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idMetodoCobro}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>