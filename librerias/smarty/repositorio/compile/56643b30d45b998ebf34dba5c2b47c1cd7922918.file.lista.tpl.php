<?php /* Smarty version Smarty-3.1.11, created on 2017-05-29 12:03:30
         compiled from "templates/plantillas/modulos/bazares/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1483661084592a1fe86a7b83-17490916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56643b30d45b998ebf34dba5c2b47c1cd7922918' => 
    array (
      0 => 'templates/plantillas/modulos/bazares/lista.tpl',
      1 => 1496077406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1483661084592a1fe86a7b83-17490916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_592a1fe87438d0_82728751',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592a1fe87438d0_82728751')) {function content_592a1fe87438d0_82728751($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Inicio</th>
					<th>Estado</th>
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
						<td style="border-left: 2px solid <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>blue<?php }else{ ?>red<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>blue<?php }else{ ?>red<?php }?>"><?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==1){?>Activo<?php }else{ ?>Inactivo<?php }?></td>
						<td style="text-align: right">
							<a href="inventario/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/" class="btn btn-default" title="Inventario">I</a>
							
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>