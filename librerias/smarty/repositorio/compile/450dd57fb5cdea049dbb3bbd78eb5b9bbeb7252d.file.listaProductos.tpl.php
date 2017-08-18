<?php /* Smarty version Smarty-3.1.11, created on 2017-08-18 09:58:17
         compiled from "templates/plantillas/modulos/bazares/listaProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9824417359448dfa69ee19-76842920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450dd57fb5cdea049dbb3bbd78eb5b9bbeb7252d' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/listaProductos.tpl',
      1 => 1502808612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9824417359448dfa69ee19-76842920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448dfa7527b2_16160947',
  'variables' => 
  array (
    'select' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448dfa7527b2_16160947')) {function content_59448dfa7527b2_16160947($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
<div class="box">
	<div class="box-body">
<?php }?>
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
					<th>Descuento</th>
					<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
					<th>&nbsp;</th>
					<?php }?>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
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
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['inventario'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['descuento'];?>
 %</td>
						<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
						<td class="text-right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
"><i class="fa fa-times"></i></button>
						</td>
						<?php }?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
<?php if ($_smarty_tpl->tpl_vars['select']->value!=true){?>
	</div>
</div>
<?php }?><?php }} ?>