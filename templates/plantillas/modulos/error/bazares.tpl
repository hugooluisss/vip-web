{if $PAGE.usuario->getIdTipo() eq 2}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de bazares o mercados Es necesario contar con un bazar o mercado
		</div>
		<div class="panel-body">
			Ve a Administración - Bazar y Mercados y agrega un bazar o mercado para poder iniciar con tu primera nota de venta
		</div>
		<div class="panel-fotter text-center">
			<a href="bazares">Ir al catálogo de bazares</a>
		</div>
	</div>
{/if}

{if $PAGE.usuario->getIdTipo() neq 2}
	<div class="panel panel-warning">
		<div class="panel-heading">
			Error en la definición de bazares o mercados Es necesario contar con un bazar o mercado
		</div>
		<div class="panel-body">
			Ve a Administración - Bazar y Mercados y agrega un bazar o mercado para poder iniciar con tu primera nota de venta
		</div>
	</div>
{/if}