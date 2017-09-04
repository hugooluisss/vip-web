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
			{if $pendientes['bandEmpresa'] eq true}
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Actualiza los datos de tu empresa</div>
					<div class="panel-body">
						<p>Al parecer aun no haz actualizado la información de tu empresa. Recuerda que el realizarlo ayudará a tus clientes a identificarte</p>
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
						<p><b>¿Que es un método de cobro?</b> El método de cobro es el medio utilizado por la empresa para cobrar al cliente y puede ser de varios tipos: Bancos, Caja, Virtual</p>
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
						<p><b>Por el momento, no cuentas con ningún bazar activo</b>, si tal es el caso crealo ahora</p>
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
								<td>{$row.nombre}</td>
								<td>{$row.inicio}</td>
								<td>{$row.fin}</td>
								<td>{$row.inicial}</td>
								<td class="text-right">{$row.total}</td>
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
		</div>
	{/if}
{/if}