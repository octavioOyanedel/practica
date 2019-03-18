<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Desvincular Socio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<p>¿Esta seguro que desea eliminar a <strong>{{ $socio->nombres}} {{ $socio->apellidos}}</strong> del sistema?</p>
			</div>
			<div class="modal-footer">
                <form method="POST" action="{{ route('socios.destroy',['socio'=>$socio->id]) }}">
                    {!! method_field('DELETE') !!}
                    @csrf
   					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
   					<button type="submit" class="btn btn-danger btn-sm">Desvincular</button>
				</form>
			</div>
		</div>
	</div>
</div>