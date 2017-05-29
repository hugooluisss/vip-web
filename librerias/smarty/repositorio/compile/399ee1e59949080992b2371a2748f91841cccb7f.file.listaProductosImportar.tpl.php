<?php /* Smarty version Smarty-3.1.11, created on 2017-05-29 12:01:19
         compiled from "templates/plantillas/modulos/bazares/listaProductosImportar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156154798592c494cccab29-82486519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '399ee1e59949080992b2371a2748f91841cccb7f' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/listaProductosImportar.tpl',
      1 => 1496077269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156154798592c494cccab29-82486519',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_592c494cd694a7_88714730',
  'variables' => 
  array (
    'json' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c494cd694a7_88714730')) {function content_592c494cd694a7_88714730($_smarty_tpl) {?><br />
<div class="row">
	<div class="col-xs-12 text-right">
		<button type="button" id="btnImportar" class="btn btn-danger"> Importar</button>
	</div>
</div>
<input type="hidden" id="jsonImportar" value='<?php echo $_smarty_tpl->tpl_vars['json']->value;?>
' />
<br />
<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>CB</th>
			<th>CI</th>
			<th>Descripción</th>
			<th>Color/Talla/Unidad</th>
			<th>Costo</th>
			<th>Descuento</th>
			<th>Precio</th>
			<th>Existencias</th>
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
/<?php echo $_smarty_tpl->tpl_vars['row']->value['talla'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['unidad'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['costo'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['descuento'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['existencias'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>