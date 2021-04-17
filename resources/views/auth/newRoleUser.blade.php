@extends('layouts.appComun')
@section('title', 'Asignar Rol')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">ASIGNAR ROLES A USUARIOS</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>

<!-- Formulario para agregar empresa de marcas -->
<form class="form-group" method="POST" action="/G:19-2000" enctype="multipart/form-data">
    @csrf
    
<!-- Cagason para ver si puedo seleccionar Usuarios -->
<div class="container-fluid">
<div class="div">
<div class="row justify-content-md-center">
    @foreach($Users as $User)
    <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        PERSONAL<br>
        {{$User->name}}<br>
        {{$User->email}}
      <div class="form-check">
        <input  class="form-check-input" type="checkbox" name="user_id[]" value="{{$User->id}}">
        <label class="form-check-label">
            Seleccionar
        </label>
      </div>
      </div>
    </div>
    </div>
    @endforeach  
</div>
</div>
</div>


    <!-- Información de la marca -->
    <div class="container-sm" class="form-group">
        <div class="col mt-4">

            <label class="mt-2">Rol</label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="role_id" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">Super Admin</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="role_id" value="3" checked>
            <label class="form-check-label" for="exampleRadios1">Personal médico</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="radio" name="role_id" value="2" checked>
            <label class="form-check-label" for="exampleRadios1">Ingeniero</label>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        </div>
    </div>

</form>
@endsection