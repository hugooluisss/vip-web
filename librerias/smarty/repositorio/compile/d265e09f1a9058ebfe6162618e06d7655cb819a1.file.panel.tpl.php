<?php /* Smarty version Smarty-3.1.11, created on 2017-10-02 09:50:12
         compiled from "templates/plantillas/modulos/bazares/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7513394415953cdb55d7d20-91734581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd265e09f1a9058ebfe6162618e06d7655cb819a1' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/panel.tpl',
      1 => 1506955810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7513394415953cdb55d7d20-91734581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5953cdb56be8d1_49870594',
  'variables' => 
  array (
    'informacionCompleta' => 0,
    'PAGE' => 0,
    'usuarios' => 0,
    'row' => 0,
    'tipos' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5953cdb56be8d1_49870594')) {function content_5953cdb56be8d1_49870594($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['informacionCompleta']->value!=true){?>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/error/empresas.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</div>
<?php }else{ ?>
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
				<div class="alert alert-info">
					A continuación se presenta la lista de usuarios registrados en el sistema, los marcados son los que tienen acceso al bazar
				</div>
				<div class="text-right">
					<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#winAddUsuarios">Agregar usuario</button>
					<br />
					<br />
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 tipo2">
						<div class="text-center"><b>Responsable</b></div>
						<hr />
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value['tipo2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<label><input type="checkbox" class="usuario" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"> <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</span></label>
						<br />
					<?php } ?>
					</div>
					<div class="col-xs-12 col-sm-4 tipo3">
						<div class="text-center"><b>Vendedor</b></div>
						<hr />
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value['tipo3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<label><input type="checkbox" class="usuario" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"> <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</span></label>
						<br />
					<?php } ?>
					</div>
					<div class="col-xs-12 col-sm-4 tipo4">
						<div class="text-center"><b>Inventarios</b></div>
						<hr />
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value['tipo4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<label><input type="checkbox" class="usuario" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"> <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</span></label>
						<br />
					<?php } ?>
					</div>
				</div>
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



<form role="form" id="frmAddUsers" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winAddUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" identificador="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Agregar usuario</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selTipo" class="col-sm-4">Tipo</label>
						<div class="col-sm-8">
							<select class="form-control" id="selTipo" name="selTipo">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-sm-4">Nombre</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-4">Correo electrónico</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-sm-4">Contraseña</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="btnAddUser">Guardar</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</form>

<?php }?><?php }} ?>