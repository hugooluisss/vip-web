<div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		{$PAGE.usuario->getNombre()}
	</div>
</div>

{if $PAGE.usuario->getIdTipo() neq 1}
	{if count($pendientes) > 0}
		<div class="row">
			{if $pendientes['bandEmpresa'] eq true or $pendientes['bandTarjetas'] eq true}
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Actualiza los datos de tu empresa</div>
					<div class="panel-body">
						<p>Al parecer aun no has actualizado la información de tu empresa.
Es un paso obligatorio para terminar tu registro. Además, eso ayudará a tus clientes a identificarte.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="miEmpresa" >Ir a Mi empresa</a>
					</div>
				</div>
			</div>
			{/if}
			{if $pendientes['bandMetodosCobro'] eq true}
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Crea un método de cobro</div>
					<div class="panel-body">
						<p>Antes de iniciar a vender es necesario dar de alta por lo menos un método de cobro.</p>
						<p><b>¿Que es un método de cobro?</b> El método de cobro es el medio utilizado por tu empresa para cobrar a sus clientes. Puede ser de varios tipos: Terminal Bancaria, Caja, Terminal Virtual.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="metodoscobro" >Ir a métodos de cobro</a>
					</div>
				</div>
			</div>
			{/if}
			{if $pendientes['bandBazar'] eq true}
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Crea tu primer bazar</div>
					<div class="panel-body">
						<p><b>Por el momento, no cuentas con ningún bazar activo</b>Crea uno ahora para poder empezar a monitorear tus Ventas, Inventarios y Pedidos.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="bazares" >Ir a Bazares</a>
					</div>
				</div>
			</div>
			{/if}
		</div>
	{else}
		<div class="box">
			<div class="box-header">
				<h3>Bazares activos</h3>
			</div>
			<div class="box-body">
				<table id="tblBazares" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Inicia</th>
							<th>Termina</th>
							<th>Inicial</th>
							<th>Total de ventas</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$bazares item="row"}
							<tr>
								<td>{$row.nombre} 
									{if $row.productos == 0}
										<a href="productos/{$row.idBazar}-bazar/" class="text-danger" ><small>Ojo, no tienes productos para este bazar, haz clic aquí para cargarlos</small></a>
									{/if}
								</td>
								<td>{$row.inicio}</td>
								<td>{$row.fin}</td>
								<td>{$row.inicial}</td>
								<td class="text-right">{$row.total}</td>
							</tr>
						{foreachelse}
							<tr>
								<td colspan="5">Aun no hay ventas</td>
							</tr>
						{/foreach}
					</tbody>
					<tfoot>
						<tr>
							<td class="text-right" colspan="4">Total</td>
							<td class="text-right"><b>{$totalBazares}</b></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="box-footer text-right">
				<a href="bazares" >Crear un nuevo Bazar/Mercado</a>
			</div>
		</div>
	{/if}
{/if}