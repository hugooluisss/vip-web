<div class="row">
	{foreach from=$bazares item="row"}
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					{$row.nombre}
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 text-success">
							Total de ventas
						</div>
						<div class="col-xs-6 text-right">
							$ {$row.monto}
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 text-primary">
							Total de pagos
						</div>
						<div class="col-xs-6 text-right">
							$ {$row.pagos}
						</div>
					</div>
				</div>
				<div class="panel-footer text-right">
					<a href="puntoventa/{$row.idBazar}-bazar/">Ir al punto de venta</a>
				</div>
			</div>
			
		</div>
	{/foreach}
</div>