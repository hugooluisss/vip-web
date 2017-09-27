{if $PAGE.usuario->getIdTipo() eq 2}
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
{/if}

{if $PAGE.usuario->getIdTipo() neq 2}
	<div class="panel panel-danger">
		<div class="panel-heading">Actualiza los datos de tu empresa</div>
		<div class="panel-body">
			<p>Al parecer aun no has actualizado la información de tu empresa. Es un paso obligatorio para terminar tu registro. Además, eso ayudará a tus clientes a identificarte.</p>

			<p>Pídele al responsable del bazar que registre los datos</p>
		</div>
	</div>
{/if}