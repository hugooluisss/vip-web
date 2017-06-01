<?php /* Smarty version Smarty-3.1.11, created on 2017-06-01 09:13:27
         compiled from "templates/plantillas/modulos/bazares/listaProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:730996178592a2a650c3a81-06598528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450dd57fb5cdea049dbb3bbd78eb5b9bbeb7252d' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/listaProductos.tpl',
      1 => 1496326229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '730996178592a2a650c3a81-06598528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_592a2a6514f325_94921195',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592a2a6514f325_94921195')) {function content_592a2a6514f325_94921195($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código Barras</th>
					<th>Código Interno</th>
					<th>Descripción</th>
					<th>Color</th>
					<th>Talla</th>
					<th>Existencia</th>
					<th>Precio</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigoBarras'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigoInterno'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['talla'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['existencias'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
						<td class="text-right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>