<?php /* Smarty version Smarty-3.1.11, created on 2017-05-11 22:01:09
         compiled from "templates/plantillas/modulos/empresas/panelMiEmpresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:772156433591521af986027-36244439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '360ca23c1b4da61149fc752621b02aa684ff8be2' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/panelMiEmpresa.tpl',
      1 => 1494558026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '772156433591521af986027-36244439',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_591521af9d4217_89749622',
  'variables' => 
  array (
    'empresa' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591521af9d4217_89749622')) {function content_591521af9d4217_89749622($_smarty_tpl) {?><form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">			
			<div class="form-group">
				<label for="txtRazonSocial" class="col-sm-4">Razon social</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getRazonSocial();?>
" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtSlogan" class="col-sm-4">Slogan</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtSlogan" name="txtSlogan" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getSlogan();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-4">Dirección</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getDireccion();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-sm-4">Teléfono</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getTelefono();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-sm-4">Correo electrónico</label>
				<div class="col-sm-5">
					<input class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getEmail();?>
"/>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
			<input type="hidden" id="activo" value="1"/>
		</div>
	</div>
</form><?php }} ?>