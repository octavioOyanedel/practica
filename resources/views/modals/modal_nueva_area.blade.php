<!-- Modal -->
<div class="modal fade" id="modal_nueva_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva Área</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <form id="form_nueva_area">
                    <label class="etiqueta-form" for="sede_actual">Sede * </label>
                    <select id="sede_actual" class="form-control form-control-sm form-modal" name="sede_actual" required><option selected="true" value="">Seleccione Sede</option></select>
                    <label class="etiqueta-form separar-label" for="nueva_area">Nueva Área * <small class="errores-modal" class="form-text text-muted"></small></label>
                    <input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nueva_area" id="nueva_area" value=""/>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
				<button id="guardar_nueva_area" type="button" class="btn btn-primary btn-sm guardar-cambios">Guardar</button>
			</div>
		</div>
	</div>
</div>