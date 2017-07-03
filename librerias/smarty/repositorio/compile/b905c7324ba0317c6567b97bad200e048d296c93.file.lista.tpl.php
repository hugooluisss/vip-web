<?php /* Smarty version Smarty-3.1.11, created on 2017-06-30 22:30:05
         compiled from "templates/plantillas/modulos/operaciones/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1814794655956949debdb24-07555179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b905c7324ba0317c6567b97bad200e048d296c93' => 
    array (
      0 => 'templates/plantillas/modulos/operaciones/lista.tpl',
      1 => 1498879799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1814794655956949debdb24-07555179',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5956949def8590_12018292',
  'variables' => 
  array (
    'operaciones' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5956949def8590_12018292')) {function content_5956949def8590_12018292($_smarty_tpl) {?><table id="tblOperaciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Código barras</th>
			<th>Descripción</th>
			<th>Cantidad</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['operaciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigoBarras'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
				<td class="text-right">
					<input type="number" cantidad="<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
" class="form-control text-right" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idOperacion'];?>
"/>
				</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idOperacion'];?>
"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>