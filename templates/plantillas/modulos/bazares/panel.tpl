<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Bazares</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
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
						<label for="txtNombre" class="col-sm-2">Nombre</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtInicio" class="col-sm-2">Inicio</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtInicio" name="txtInicio">
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
						<label for="txtInicial" class="col-sm-2">Identificador</label>
						<div class="col-sm-1">
							<input class="form-control" id="txtInicial" name="txtInicial">
						</div>
					</div>
					<div class="form-group">
						<label for="txtFolio" class="col-sm-2">Folio</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFolio" name="txtFolio">
							<p class="help-block">Último entregado</p>
						</div>
					</div>
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