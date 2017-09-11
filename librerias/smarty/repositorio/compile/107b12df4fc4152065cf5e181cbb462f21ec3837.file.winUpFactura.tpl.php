<?php /* Smarty version Smarty-3.1.11, created on 2017-09-08 21:53:49
         compiled from "templates/plantillas/modulos/reportesAdmin/winUpFactura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208018291559ad6475da08f7-09238122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107b12df4fc4152065cf5e181cbb462f21ec3837' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/winUpFactura.tpl',
      1 => 1504541205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208018291559ad6475da08f7-09238122',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ad6475da2077_69906302',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ad6475da2077_69906302')) {function content_59ad6475da2077_69906302($_smarty_tpl) {?><div class="modal fade" id="winFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" comision="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Subir factura</h4>
			</div>
			<div class="modal-body">
				<form id="upload" method="post" action="?mod=ccobranza&action=upload" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<br />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
				<ul class="errores list-group">
				</ul>
			</div>
		</div>
	</div>
</div><?php }} ?>