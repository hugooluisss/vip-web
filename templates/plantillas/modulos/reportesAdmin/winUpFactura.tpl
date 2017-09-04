<div class="modal fade" id="winFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" comision="">
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
</div>