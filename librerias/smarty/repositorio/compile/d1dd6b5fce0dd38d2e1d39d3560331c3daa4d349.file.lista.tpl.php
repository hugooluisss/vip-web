<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 20:59:02
         compiled from "templates/plantillas/modulos/empresas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195141289459448ce65213f8-78565264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1dd6b5fce0dd38d2e1d39d3560331c3daa4d349' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/lista.tpl',
      1 => 1494555424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195141289459448ce65213f8-78565264',
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
  'unifunc' => 'content_59448ce6571734_00321365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448ce6571734_00321365')) {function content_59448ce6571734_00321365($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Razón social</th>
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
						<td style="border-left: 2px solid <?php if ($_smarty_tpl->tpl_vars['row']->value['activo']==1){?>blue<?php }else{ ?>red<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
						<td style="text-align: right">
							<a href="admonUsuarios/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
-<?php echo str_replace(" ",'',$_smarty_tpl->tpl_vars['row']->value['razonsocial']);?>
/" class="btn btn-default" title="Usuarios"><i class="fa fa-users"></i></a>
							
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>