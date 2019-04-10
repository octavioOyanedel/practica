<!-- Modal -->
<div class="modal fade" id="modal_prestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Saldar Prestamo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<p>¿Esta seguro que desea cambiar estado de prestamo <strong>{{ $prestamo->numero_prestamo}}</strong> perteneciente a <strong>{{ $prestamo->socio_id}}</strong> a cancelado?</p>
			</div>
			<div class="modal-footer">
				<form method="POST" action="{{ route('prestamos.update',['prestamo'=>$prestamo->id]) }}">
					{!! method_field('PUT') !!}
					@csrf
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
					<button id="saldar_prestamo" type="submit" class="btn btn-primary btn-sm guardar-cambios">Saldar Prestamo</button>
				</form>
			</div>
		</div>
	</div>
</div>