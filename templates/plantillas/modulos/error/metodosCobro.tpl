{if $PAGE.usuario->getIdTipo() eq 2}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en métodos de cobro
		</div>
		<div class="panel-body">
			Es necesario contar con métodos de cobro Ve a Administración - Métodos de cobro y agrega un método de cobro (por lo menos una Caja) para poder iniciar con nu primera nota de venta
		</div>
		<div class="panel-fotter text-center">
			<a href="metodoscobro">Ir métodos de cobro</a>
		</div>
	</div>
{/if}

{if $PAGE.usuario->getIdTipo() neq 2}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en métodos de cobro
		</div>
		<div class="panel-body">
			Es necesario contar con métodos de cobro Ve a Administración - Métodos de cobro y agrega un método de cobro (por lo menos una Caja) para poder iniciar con nu primera nota de venta
		</div>
	</div>
{/if}