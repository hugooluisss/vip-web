{if $PAGE.usuario->getIdTipo() eq 1}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de los bazares
		</div>
		<div class="panel-body">
			Es necesario contar con un bazar... agrega la definición de uno para iniciar con el registro de productos
		</div>
		<div class="panel-fotter text-center">
			<a href="bazares">Ir al catálogo de bazares</a>
		</div>
	</div>
{/if}

{if $PAGE.usuario->getIdTipo() neq 1}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de los bazares
		</div>
		<div class="panel-body">
			Es necesario contar con un bazar... solicita que agregén un bazar para iniciar con el trabajo
		</div>
	</div>
{/if}