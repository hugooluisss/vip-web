<?php /* Smarty version Smarty-3.1.11, created on 2017-09-04 09:14:08
         compiled from "templates/plantillas/modulos/reportesAdmin/winOrden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185553133959973685badae1-78969962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a75a350bb3035222c8a9b011bd2053890a811bc' => 
    array (
      0 => 'templates/plantillas/modulos/reportesAdmin/winOrden.tpl',
      1 => 1504533359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185553133959973685badae1-78969962',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59973685bedd46_45357193',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59973685bedd46_45357193')) {function content_59973685bedd46_45357193($_smarty_tpl) {?><form role="form" id="frmCobro" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winOrdenCobro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" comision="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cobro</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Concepto</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="txtConcepto" name="txtConcepto" maxlength="249" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Monto</label>
						<div class="col-lg-5">
							<input type="text" class="form-control text-right" id="txtMonto" name="txtMonto" disabled="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPorcentaje" class="col-lg-2">Porcentaje</label>
						<div class="col-lg-5">
							<div class="input-group">
								<input type="number" class="form-control text-right" id="txtPorcentaje" name="txtPorcentaje" value="5" readonly="true"/>
								<span class="input-group-addon" id="basic-addon2">%</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Total a cobrar</label>
						<div class="col-lg-5">
							<input type="text" class="form-control text-right" id="txtCobro" name="txtCobro" readonly="true" disabled="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="selTarjeta" class="col-lg-2">Pagar con </label>
						<div class="col-lg-10">
							<select id="selTarjeta" name="selTarjeta" class="form-control">
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Realizar cargo</button>
					<button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</form><?php }} ?>