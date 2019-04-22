<!-- Modal -->
<div class="modal fade" id="modal_nueva_sede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva Sede</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <label class="etiqueta-form" for="nueva_sede">Sede * <small class="errores-modal" class="form-text text-muted"></small></label>
                <input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nueva_sede" id="nueva_sede" value="" required/>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
				<button id="guardar_nueva_sede" type="button" class="btn btn-primary btn-sm guardar-cambios">Guardar</button>
			</div>
		</div>
	</div>
</div>