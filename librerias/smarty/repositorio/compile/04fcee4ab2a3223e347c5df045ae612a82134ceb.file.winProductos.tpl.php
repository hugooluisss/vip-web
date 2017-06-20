<?php /* Smarty version Smarty-3.1.11, created on 2017-06-20 09:46:52
         compiled from "templates/plantillas/modulos/ventas/winProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23196336259448df9b6a0e7-26020233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04fcee4ab2a3223e347c5df045ae612a82134ceb' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/winProductos.tpl',
      1 => 1497965910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23196336259448df9b6a0e7-26020233',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448df9b6e4d9_89642597',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448df9b6e4d9_89642597')) {function content_59448df9b6e4d9_89642597($_smarty_tpl) {?><div class="modal fade" id="winProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Productos</h4>
			</div>
			<div class="modal-body">
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
				</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>