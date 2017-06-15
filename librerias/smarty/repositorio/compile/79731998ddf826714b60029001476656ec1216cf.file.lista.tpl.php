<?php /* Smarty version Smarty-3.1.11, created on 2017-06-15 13:42:20
         compiled from "templates/plantillas/modulos/ventas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24709900594170788a2064-44980558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79731998ddf826714b60029001476656ec1216cf' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/lista.tpl',
      1 => 1497552137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24709900594170788a2064-44980558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_594170788ea810_74455395',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594170788ea810_74455395')) {function content_594170788ea810_74455395($_smarty_tpl) {?><table id="tblVentas" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Folio</th>
			<th>Fecha</th>
			<th>Cliente</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' style="border-left: 4px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['colorEstado'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['nombreEstado'];?>
">
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombreCliente'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>