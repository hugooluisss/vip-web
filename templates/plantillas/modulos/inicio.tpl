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
		<div class="panel panel-primary">
			<div class="panel-heading">
				Ingresos
			</div>
			<div class="panel-body">
				<table id="tblPagos" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Bazar</th>
							<th>Folio</th>
							<th>Cobro</th>
							<th>Referencia</th>
							<th>Monto</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$pagos item="row"}
							<tr>
								<td>{$row.fecha}</td>
								<td>{$row.bazar}</td>
								<td>
									<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}" onclick="javascript: return false;">{$row.folio}</a>
								</td>
								<td>{$row.destino}</td>
								<td>{$row.referencia}</td>
								<td>$ {$row.monto}</td>
							</tr>
						{/foreach}
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5" class="text-right">Total</th>
							<th>$ {$totalPagos}</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				Productos sin entregar
			</div>
			<div class="panel-body">
				<table id="tblSinEntregar" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Bazar</th>
							<th>Folio</th>
							<th>Descripción</th>
							<th>Vendidos</th>
							<th>Entregados</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$productosSinEntregar item="row"}
							<tr>
								<td>{$row.bazar}</td>
								<td>
									<a href="#" class="" role="button" action="ticket" title="Comprobante de venta" datos='{$row.json}' idVenta="{$row.idVenta}" onclick="javascript: return false;">{$row.folio}</a>
								</td>
								<td>{$row.descripcion}</td>
								<td class="text-right">{$row.cantidad}</td>
								<td class="text-right">{$row.entregado}</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>