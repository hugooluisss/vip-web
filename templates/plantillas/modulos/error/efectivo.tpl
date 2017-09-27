{if $PAGE.usuario->getIdTipo() eq 2}
	<div class="alert alert-warning alert-dismissable">
		<div class="panel-heading">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<b>No has agregado una caja</b>
			<p>Para poder cobrar en efectivo, te recomendamos agregar por lo menos una caja en la sección Administración - Métodos de cobro - Agregar. Ahí, selecciona el tipo "Efectivo" y dale un destino o nombre (por ejemplo: "Caja Juan")</p>
			<p class="text-right">
				<a href="metodoscobro" class="btn btn-danger">Ir a Métodos de cobro</a>
				<button class="btn btn-default" data-dismiss="alert" aria-label="close">Cerrar</button>
			</p>
			
		</div>
	</div>
{/if}

{if $PAGE.usuario->getIdTipo() neq 2}
	<div class="alert alert-warning alert-dismissable">
		<div class="panel-heading">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<b>No has agregado una caja</b>
			<p>Para poder cobrar en efectivo, te recomendamos agregar por lo menos una caja en la sección Administración - Métodos de cobro - Agregar. Ahí, selecciona el tipo "Efectivo" y dale un destino o nombre (por ejemplo: "Caja Juan")</p>
		</div>
	</div>
{/if}