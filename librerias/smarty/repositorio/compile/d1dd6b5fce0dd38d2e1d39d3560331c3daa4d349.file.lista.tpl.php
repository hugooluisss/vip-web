<?php /* Smarty version Smarty-3.1.11, created on 2017-05-09 13:43:26
         compiled from "templates/plantillas/modulos/empresas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136594591259120c07f14800-58695612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1dd6b5fce0dd38d2e1d39d3560331c3daa4d349' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/lista.tpl',
      1 => 1494355311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136594591259120c07f14800-58695612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59120c0807e7b3_26897591',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59120c0807e7b3_26897591')) {function content_59120c0807e7b3_26897591($_smarty_tpl) {?><div class="box">
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