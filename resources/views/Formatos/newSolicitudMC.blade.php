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
	<input type="string" name="ID_inv" class="form-control" pattern="[a-zA-Z0-9]*" placeholder="Número de identificación de inventario del equipo">
	<label class="mt-2" for="">Descripción del fallo</label>
	<input type="longText" name="Descripcion_del_fallo" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Descripcion del error o mal funcionamiento del equipo">
	<label class="mt-2" for="">Observaciones</label>
	<input type="longText" name="Observaciones" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Estado de los cables, de la carcasa del equipo, de los botones, etc.">	
</div>

		<button type="submit" class="btn btn-primary">Guardar</button>
								
</div>
</form>
@endsection

