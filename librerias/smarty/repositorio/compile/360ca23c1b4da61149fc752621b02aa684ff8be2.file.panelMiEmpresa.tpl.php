<?php /* Smarty version Smarty-3.1.11, created on 2017-07-13 09:46:33
         compiled from "templates/plantillas/modulos/empresas/panelMiEmpresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84928952594484f80ab332-32821012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '360ca23c1b4da61149fc752621b02aa684ff8be2' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/panelMiEmpresa.tpl',
      1 => 1499957187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84928952594484f80ab332-32821012',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_594484f80de2b3_75095956',
  'variables' => 
  array (
    'empresa' => 0,
    'img' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594484f80de2b3_75095956')) {function content_594484f80de2b3_75095956($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Mi empresa</h1>
	</div>
</div>

<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">	
			<div class="row">
				<div class="col-xs-12 text-center">
					<a href="#" data-toggle="modal" data-target="#winFotografia">
						<?php $_smarty_tpl->tpl_vars["img"] = new Smarty_variable((("repositorio/empresas/empresa").($_smarty_tpl->tpl_vars['empresa']->value->getId())).(".jpg"), null, 0);?> 

						<?php if (file_exists($_smarty_tpl->tpl_vars['img']->value)){?>
						<img src="repositorio/empresas/empresa<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getId();?>
.jpg" id="logotipo" style="height: 100px;"/>
						<?php }else{ ?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['imagenes'];?>
no-camara.jpg" id="logotipo" style="height: 100px;"/>
						<?php }?>
						<br />
						<small class="text-info">Click para cambiar el logotipo de la empresa</small>
					</a>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRazonSocial" class="col-sm-2">Razon social *</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getRazonSocial();?>
" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtSlogan" class="col-sm-2">Slogan</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtSlogan" name="txtSlogan" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getSlogan();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtMarca" class="col-sm-2">Marca</label>
				<div class="col-sm-10">
					<input class="form-control" id="txtMarca" name="txtMarca" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getMarca();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-sm-2">Domicilio</label>
				<div class="col-sm-8">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getDireccion();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtExterno" class="col-sm-2">#Ext</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtExterno" name="txtExterno" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getExterno();?>
"/>
				</div>
				<label for="txtInterno" class="col-sm-2 col-sm-offset-2">#Int</label>
				<div class="col-sm-2">
					<input class="form-control" id="txtInterno" name="txtInterno" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getInterno();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtColonia" class="col-sm-2">Colonia</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtColonia" name="txtColonia" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getColonia();?>
"/>
				</div>
				<label for="txtMunicipio" class="col-sm-2 col-sm-offset-1">Municipio</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtMunicipio" name="txtMunicipio" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getMunicipio();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCiudad" class="col-sm-2">Ciudad</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtCiudad" name="txtCiudad" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getCiudad();?>
"/>
				</div>
				<label for="txtEstado" class="col-sm-2 col-sm-offset-1">Estado</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEstado" name="txtEstado" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getEstado();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-sm-2">R. F. C.</label>
				<div class="col-sm-4">
					<input class="form-control" id="txtRFC" name="txtRFC" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getRFC();?>
"/>
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-sm-2">Correo electrónico</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getEmail();?>
"/>
				</div>
				<label for="txtTelefono" class="col-sm-2 col-sm-offset-1">Teléfono</label>
				<div class="col-sm-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getTelefono();?>
"/>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getId();?>
"/>
			<input type="hidden" id="activo" value="1"/>
		</div>
	</div>
</form>


<div class="modal fade" id="winFotografia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Actualizar logotipo de la empresa</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<p>Se sugiere el uso de imágenes en formato jpg con resolución de 255px por 255px</p>
				</div>
				<form id="upload" method="post" action="?mod=cempresas&action=uploadfile&empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getId();?>
" enctype="multipart/form-data">
					<input type="file" name="upl" accept="image/jpg,image/jpeg"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>