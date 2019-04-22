<!-- Modal -->
<div class="modal fade" id="modal_nuevo_cargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Cargo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <label class="etiqueta-form" for="nuevo_cargo">Nuevo Cargo * <small class="errores-modal" class="form-text text-muted"></small></label>
                <input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nuevo_cargo" id="nuevo_cargo" value=""/>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
				<button id="guardar_nuevo_cargo" type="button" class="btn btn-primary btn-sm guardar-cambios">Guardar</button>
			</div>
		</div>
	</div>
</div>