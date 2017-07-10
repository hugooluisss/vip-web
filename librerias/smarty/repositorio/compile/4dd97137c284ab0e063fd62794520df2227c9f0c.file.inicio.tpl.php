<?php /* Smarty version Smarty-3.1.11, created on 2017-07-10 13:56:02
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166554977059448ce019a6d9-45010204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1499712961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166554977059448ce019a6d9-45010204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59448ce01d1286_07561695',
  'variables' => 
  array (
    'PAGE' => 0,
    'productosSinEntregar' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59448ce01d1286_07561695')) {function content_59448ce01d1286_07561695($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>

	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Productos sin entregar
			</div>
			<div class="panel-body">
				<table id="tblDatos" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Folio</th>
							<th>Descripción</th>
							<th>Vendidos</th>
							<th>Entregados</th>
							<th>Pendientes</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productosSinEntregar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['entregado'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad']-$_smarty_tpl->tpl_vars['row']->value['entregado'];?>
</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><?php }} ?>