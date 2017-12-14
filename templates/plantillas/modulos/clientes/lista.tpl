{if $select neq true}
<div class="box">
	<div class="box-body">
		<div class="btn-toolbar" role="toolbar" aria-label="...">
			<div class="btn-group" role="group" aria-label="...">
				<button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#winAyuda">Ayuda</button>
			</div>
		</div>
		
		<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Definición de íconos</h4>
					</div>
					<div class="modal-body">
						<button class="btn btn-default">D</button> Establece al cliente como el cliente por defecto<br /><br />
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button> Modificar<br /><br />
						<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
{/if}
		
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Razón Social</th>
					<th>Default</th>
					{if $select neq true}
					<th>&nbsp;</th>
					{/if}
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr json='{$row.json}'>
						<td>{$row.idCliente}</td>
						<td>{$row.nombre}</td>
						<td>{$row.razonsocial}</td>
						<td class="text-center" {if $row.idCliente eq $parametros['clienteDefault']}clienteDefault="1" json='{$row.json}'{/if}>{if $row.idCliente eq $parametros['clienteDefault']}<i class="fa fa-check" aria-hidden="true"></i>{/if}</td>
						{if $select neq true}
						<td style="text-align: right">
							{if $row.idCliente neq $parametros['clienteDefault']}
								<button type="button" class="btn btn-default" action="default" title="Establecer como cliente por defecto para las ventas" identificador="{$row.idCliente}">D</button>
							{/if}
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idCliente}"><i class="fa fa-times"></i></button>
						</td>
						{/if}
					</tr>
				{/foreach}
			</tbody>
		</table>
{if $select neq true}
	</div>
</div>
{/if}