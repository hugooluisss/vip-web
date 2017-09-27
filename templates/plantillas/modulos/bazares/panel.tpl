{if $informacionCompleta neq true}
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			{include file=$PAGE.rutaModulos|cat:"modulos/error/empresas.tpl"}
		</div>
	</div>
{else}
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Bazares y mercados</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtNombre" class="col-sm-2">Nombre *</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtInicio" class="col-sm-2">Inicia *</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtInicio" name="txtInicio">
						</div>
					</div>
					<div class="form-group">
						<label for="txtFin" class="col-sm-2">Termina</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFin" name="txtFin">
						</div>
					</div>
					<div class="form-group">
						<label for="selEstado" class="col-sm-2">Estado</label>
						<div class="col-sm-2">
							<select id="selEstado" name="selEstado" class="form-control">
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
							</select>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtInicial" class="col-sm-2">Identificador *</label>
						<div class="col-sm-1">
							<input class="form-control" id="txtInicial" name="txtInicial">
						</div>
						<div class="col-sm-9">
							<p class="help-block">Inicial con la que se identifica el folio</p>
						</div>
					</div>
					<!--
					<div class="form-group">
						<label for="txtFolio" class="col-sm-2">Folio *</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFolio" name="txtFolio">
							<p class="help-block">Último entregado</p>
						</div>
					</div>
					-->
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="winUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Usuarios</h4>
			</div>
			<div class="modal-body">
				<p>
					A continuación se presenta la lista de usuarios registrados en el sistema, los marcados son los que tienen acceso al bazar
				</p>
				{foreach from=$usuarios item="row"}
					<label><input type="checkbox" class="usuario" value="{$row.idUsuario}"> <span class="text-primary">{$row.nombre}</span> <small><span class="text-muted">{$row.perfil}</span></small></label>
					<br />
				{/foreach}
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="winAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Definición de íconos</h4>
			</div>
			<div class="modal-body">
				<button class="btn btn-primary" style="width: 40px;"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button> Catálogo de productos<br /><br />
				<button class="btn btn-primary" style="width: 40px;"><i class="fa fa-users"></i></button> Usuarios del bazar<br /><br />
				<button class="btn btn-success" style="width: 40px;"><i class="fa fa-pencil"></i></button> Modificar bazar<br /><br />
				<button class="btn btn-danger" style="width: 40px;"><i class="fa fa-times"></i></button> Eliminar bazar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{/if}