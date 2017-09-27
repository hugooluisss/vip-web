<?php /* Smarty version Smarty-3.1.11, created on 2017-09-21 09:38:16
         compiled from "templates/plantillas/modulos/usuarios/panelMisUsuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17633950565952a637d420a5-78897802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd30922cc20ab94cd5e5df65fa7a2070d4821cdb0' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panelMisUsuarios.tpl',
      1 => 1500512978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17633950565952a637d420a5-78897802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5952a637da72f3_87658394',
  'variables' => 
  array (
    'tipos' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5952a637da72f3_87658394')) {function content_5952a637da72f3_87658394($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de usuarios</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
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
						<div class="col-lg-1">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#winAyudaPerfil">
								Ayuda
							</button>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre *</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-lg-2">Correo electrónico *</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-lg-2">Contraseña *</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass2" class="col-lg-2">Confirmar *</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtPass2" name="txtPass2" type="password">
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




<div class="modal fade" id="winAyudaPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">Tipos de usuario</h4>
			</div>
			<div class="modal-body">
				<h4>Responsable</h4>
				<ul>
					<li>Actualizar los datos de tu empresa</li>
					<li>Configurar tus métodos de cobro</li>
					<li>Crear mas cuentas de usuario</li>
					<li>Crear tu próximo bazar o mercado</li>
					<li>Dar de alta tus productos e inventario de manera sencilla</li>
					<li>Realizar ventas</li>
				</ul>
				<h4>Vendedor</h4>
				<ul>
					<li>Realizar ventas</li>
					<li>Agregar nuevos productos</li>
					<li>Crear nuevas cuentas de clientes</li>
				</ul>
				<h4>Auxiliar</h4>
				<ul>
					<li>Dar de alta tus productos e inventario de manera sencilla</li>
				</ul>
			</div>
		</div>
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
				<button class="btn btn-primary"><i class="fa fa-edit"></i></button> Modificar<br /><br />
				<button class="btn btn-danger"><i class="fa fa-times"></i></button> Eliminar<br /><br />
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>