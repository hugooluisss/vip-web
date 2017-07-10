<div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		{$PAGE.usuario->getNombre()}
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Productos sin entregar
			</div>
			<div class="panel-body">
				<table id="tblDatos" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Folio</th>
							<th>Descripción</th>
							<th>Vendidos</th>
							<th>Entregados</th>
							<th>Pendientes</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$productosSinEntregar item="row"}
							<tr>
								<td>{$row.folio}</td>
								<td>{$row.descripcion}</td>
								<td>{$row.cantidad}</td>
								<td>{$row.entregado}</td>
								<td>{$row.cantidad - $row.entregado}</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>