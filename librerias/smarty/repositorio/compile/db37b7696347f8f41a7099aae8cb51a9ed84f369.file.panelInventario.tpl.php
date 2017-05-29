<?php /* Smarty version Smarty-3.1.11, created on 2017-05-28 13:09:30
         compiled from "templates/plantillas/modulos/bazares/panelInventario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1873615140592a2415c58718-14796321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db37b7696347f8f41a7099aae8cb51a9ed84f369' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/panelInventario.tpl',
      1 => 1495994969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1873615140592a2415c58718-14796321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_592a2415c6f611_15581483',
  'variables' => 
  array (
    'bazar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592a2415c6f611_15581483')) {function content_592a2415c6f611_15581483($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Inventario</h1>
	</div>
</div>

<div class="btn-group  btn-group-xs">
	<button type="button" class="btn btn-success">Importar xls</button>
	<button type="button" class="btn btn-success">Exportar xls</button>
</div>

<div class="row">
	<div class="col-xs-12 pull-right">
		<ul id="panelTabs" class="nav nav-tabs ">
		  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
		  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
		</ul>
	</div>
</div>
<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtCodigoBarras" class="col-md-2">Código Barras</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoBarras" name="txtCodigoBarras">
						</div>
						<label for="txtCodigoInterno" class="col-md-2">Código Interno</label>
						<div class="col-md-4">
							<input class="form-control" id="txtCodigoInterno" name="txtCodigoInterno">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtDescripcion" class="col-md-2">Descripción</label>
						<div class="col-md-10">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtColor" class="col-md-2">Color</label>
						<div class="col-md-2">
							<input class="form-control" id="txtColor" name="txtColor">
						</div>
						<label for="txtTalla" class="col-md-2">Talla</label>
						<div class="col-md-2">
							<input class="form-control" id="txtTalla" name="txtTalla">
						</div>
						<label for="txtUnidad" class="col-md-2">Unidad</label>
						<div class="col-md-2">
							<input class="form-control" id="txtUnidad" name="txtUnidad">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="txtPrecio" class="col-md-2">Precio</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPrecio" name="txtPrecio" type="number">
						</div>
						<label for="txtCosto" class="col-md-offset-1 col-md-2">Costo</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCosto" name="txtCosto" type="number">
						</div>
					</div>
					
					<div class="form-group">
						<label for="txtCosto" class="col-md-2">Existencias</label>
						<div class="col-md-3">
							<input class="form-control" id="txtExistencias" name="txtExistencias" type="number">
						</div>
						<label for="txtDescuento" class="col-md-offset-1 col-md-2">Descuento</label>
						<div class="col-md-3">
							<input class="form-control" id="txtDescuento" name="txtDescuento" type="number">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					<input type="hidden" id="bazar" value="<?php echo $_smarty_tpl->tpl_vars['bazar']->value;?>
"/>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>