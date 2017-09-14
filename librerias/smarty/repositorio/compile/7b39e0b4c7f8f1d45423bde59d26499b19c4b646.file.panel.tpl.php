<?php /* Smarty version Smarty-3.1.11, created on 2017-09-14 11:21:38
         compiled from "templates/plantillas/modulos/operaciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53401678359568b1a0e4d11-76621903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b39e0b4c7f8f1d45423bde59d26499b19c4b646' => 
    array (
      0 => 'templates/plantillas/modulos/operaciones/panel.tpl',
      1 => 1502808612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53401678359568b1a0e4d11-76621903',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59568b1a1b1db4_64067431',
  'variables' => 
  array (
    'totalBazares' => 0,
    'bazares' => 0,
    'row' => 0,
    'bazar' => 0,
    'tipos' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59568b1a1b1db4_64067431')) {function content_59568b1a1b1db4_64067431($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['totalBazares']->value){?>
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Entradas y salidas de productos</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="selBazar" class="col-md-2 text-right" style="padding-top: 5px">Bazar</label>
				<div class="col-md-4">
					<select class="form-control" id="selBazar" name="selBazar">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bazares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
" <?php if ($_smarty_tpl->tpl_vars['bazar']->value==$_smarty_tpl->tpl_vars['row']->value['idBazar']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
						<?php } ?>
					</select>
				</div>
				<label for="selTipo" class="col-md-2 text-right" style="padding-top: 5px">Tipo de operación</label>
				<div class="col-md-4">
					<select class="form-control" id="selTipo" name="selTipo">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Producto</span>
				<input class="form-control" id="txtProducto" name="txtProducto" placeholder="Código de barras, código interno o descripción del producto">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#winProductos"><i class="fa fa-search" aria-hidden="true"></i></button>
				</span>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-sm-12">
		<div class="box">
			<div class="box-body" id="dvLista">
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ventas/winProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/error/bazares.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</div>
<?php }?>


<div class="modal fade" id="winNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Agregar producto</h4>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
					<!--
					<div class="form-group">
						<label for="txtCodigo" class="col-md-2 text-right">Código</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCodigo" name="txtCodigo">
						</div>
					</div>
					-->
					<div class="form-group">
						<label for="txtDescripcion" class="col-md-2 text-right">Descripción</label>
						<div class="col-md-10">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPrecio" class="col-md-2 text-right">Precio público</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPrecio" name="txtPrecio" type="number" value="0">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
							<button type="submit" class="btn btn-info pull-right">Guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<input id="codigoBarras" name="codigoBarras" type="hidden" value=""><?php }} ?>