@extends('layouts.appComun')
@section('title', 'Solicitud MC')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">GENERAR UNA NUEVA SOLICITUD DE MANTENIMIENTO</h4>
  <p>En este apartado podras generar una solicitud de mantenimiento.</p>
  <hr>
  <p class="mb-0">¡Sea cuidadoso! Verifique la información antes de guardar.</p>
</div>

<form class="form-group" method="POST" action="/Solicitud" enctype="multipart/form-data">
@csrf
<div class="container-sm">
	<div class="form-group">
		<label class="mt-2" for="">Código</label>
		<input type="string" name="ID_inv" class="form-control" pattern="[a-zA-Z0-9]*" placeholder="Número de identificación de inventario del equipo" required>
		<label class="mt-2" for="">Descripción del fallo</label>
		<input type="longText" name="Descripcion_del_fallo" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Descripcion del error o mal funcionamiento del equipo" required>
		<label class="mt-2" for="">Observaciones</label>
		<input type="longText" name="Observaciones" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Estado de los cables, de la carcasa del equipo, de los botones, etc." required>	
	</div>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
		Continuar
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						¿Está seguro de proseguir con la solicitud de mantenimiento?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Ir al PDF</button>
					</div>
				</div>
			</div>
		</div>

</div>
</form>
@endsection

