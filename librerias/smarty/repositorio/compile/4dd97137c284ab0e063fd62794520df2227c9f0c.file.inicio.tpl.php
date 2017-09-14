<?php /* Smarty version Smarty-3.1.11, created on 2017-09-14 11:59:16
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166554977059448ce019a6d9-45010204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1505408352,
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
    'pendientes' => 0,
    'bazares' => 0,
    'row' => 0,
    'totalBazares' => 0,
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

<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()!=1){?>
	<?php if (count($_smarty_tpl->tpl_vars['pendientes']->value)>0){?>
		<div class="row">
			<?php if ($_smarty_tpl->tpl_vars['pendientes']->value['bandEmpresa']==true||$_smarty_tpl->tpl_vars['pendientes']->value['bandTarjetas']==true){?>
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Actualiza los datos de tu empresa</div>
					<div class="panel-body">
						<p>Al parecer aun no has actualizado la información de tu empresa.
Es un paso obligatorio para terminar tu registro. Además, eso ayudará a tus clientes a identificarte.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="miEmpresa" >Ir a Mi empresa</a>
					</div>
				</div>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pendientes']->value['bandMetodosCobro']==true){?>
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Crea un método de cobro</div>
					<div class="panel-body">
						<p>Antes de iniciar a vender es necesario dar de alta por lo menos un método de cobro.</p>
						<p><b>¿Que es un método de cobro?</b> El método de cobro es el medio utilizado por tu empresa para cobrar a sus clientes. Puede ser de varios tipos: Terminal Bancaria, Caja, Terminal Virtual.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="metodoscobro" >Ir a métodos de cobro</a>
					</div>
				</div>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pendientes']->value['bandBazar']==true){?>
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">Crea tu primer bazar</div>
					<div class="panel-body">
						<p><b>Por el momento, no cuentas con ningún bazar activo</b>Crea uno ahora para poder empezar a monitorear tus Ventas, Inventarios y Pedidos.</p>
					</div>
					<div class="panel-footer text-right">
							<a href="bazares" >Ir a Bazares</a>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	<?php }else{ ?>
		<div class="box">
			<div class="box-header">
				<h3>Bazares activos</h3>
			</div>
			<div class="box-body">
				<table id="tblBazares" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Inicia</th>
							<th>Termina</th>
							<th>Inicial</th>
							<th>Total de ventas</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bazares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
 
									<?php if ($_smarty_tpl->tpl_vars['row']->value['productos']==0){?>
										<a href="productos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idBazar'];?>
-bazar/" class="text-danger" ><small>Ojo, no tienes productos para este bazar, haz clic aquí para cargarlos</small></a>
									<?php }?>
								</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicial'];?>
</td>
								<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</td>
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars["row"]->_loop) {
?>
							<tr>
								<td colspan="5">Aun no hay ventas</td>
							</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<td class="text-right" colspan="4">Total</td>
							<td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['totalBazares']->value;?>
</b></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="box-footer text-right">
				<a href="bazares" >Crear un nuevo bazar/Mercado</a>
			</div>
		</div>
	<?php }?>
<?php }?><?php }} ?>