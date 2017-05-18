<?php /* Smarty version Smarty-3.1.11, created on 2017-05-18 11:31:47
         compiled from "templates/plantillas/modulos/metodospago/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1460347912591dcc736cb8b7-93825459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2658bbcd97a3440ae609713899c3dad425ec0897' => 
    array (
      0 => 'templates/plantillas/modulos/metodospago/lista.tpl',
      1 => 1495124230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1460347912591dcc736cb8b7-93825459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_591dcc73770436_87850431',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591dcc73770436_87850431')) {function content_591dcc73770436_87850431($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Refencia</th>
					<th>Devoluciones</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td class="text-center"><?php if ($_smarty_tpl->tpl_vars['row']->value['referencia']==1){?>Si<?php }else{ ?>No<?php }?></td>
						<td class="text-center"><?php if ($_smarty_tpl->tpl_vars['row']->value['devoluciones']==1){?>Si<?php }else{ ?>No<?php }?></td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMetodo'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>