<?php /* Smarty version Smarty-3.1.11, created on 2017-06-20 09:46:57
         compiled from "templates/plantillas/modulos/ventas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83260548659472e841e9063-68918287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79731998ddf826714b60029001476656ec1216cf' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/lista.tpl',
      1 => 1497965910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83260548659472e841e9063-68918287',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59472e84283392_88939080',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59472e84283392_88939080')) {function content_59472e84283392_88939080($_smarty_tpl) {?><table id="tblVentas" class="table table-bordered table-hover">
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
					<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==1){?>
					<button type="button" class="btn btn-success btn-xs" action="cargar" title="Cargar y modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==2){?>
					<button type="button" class="btn btn-primary btn-xs" action="imprimir" title="Imprimir" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-pdf-o"></i></button>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>