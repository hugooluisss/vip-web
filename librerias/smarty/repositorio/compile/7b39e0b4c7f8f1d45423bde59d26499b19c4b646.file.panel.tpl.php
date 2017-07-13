<?php /* Smarty version Smarty-3.1.11, created on 2017-07-12 22:42:17
         compiled from "templates/plantillas/modulos/operaciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53401678359568b1a0e4d11-76621903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b39e0b4c7f8f1d45423bde59d26499b19c4b646' => 
    array (
      0 => 'templates/plantillas/modulos/operaciones/panel.tpl',
      1 => 1499797558,
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
	<div class="col-sm-3">
		<h1 class="page-header">Operaciones</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="selBazar" class="col-md-2 text-right">Bazar</label>
				<div class="col-md-10">
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
			</div>
			<div class="form-group">
				<label for="selTipo" class="col-md-2 text-right">Tipo de operación</label>
				<div class="col-md-10">
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
			<button type="submit" class="btn btn-info pull-right">Agregar</button>
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
<?php }?><?php }} ?>