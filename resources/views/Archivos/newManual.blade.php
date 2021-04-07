@extends('layouts.appComun')
@section('title', 'Add Manual')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">Adición de un nuevo manual</h4>
  <p> En este apartado se debera colocar la infomación requerida para agragar un nuevo equipo al inventario.</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<div class="container-sm">
<form class="form-group" method="POST" action="/manuales" enctype="multipart/form-data">
@csrf
<label class="mt-2">Titulo del manual</label>
    <input type="string" name="Titulo" class="form-control" placeholder="Titulo del manual" required>

    <label class="mt-2">Tipo de manual</label>
    <input type="string" name="Tipo" class="form-control" placeholder="Tecnico/De usuario" required>

    <label class="mt-2">Para el modelo:</label>
    <input type="string" name="Modelo_eq" class="form-control" placeholder="Modelo del equipo" required>
    
    <label class="mt-2">Manual en formato PDF</label><br/>
    <input type="file" name="Nombre" required><br/>

    <button type="submit" class="btn btn-primary mt-4">Guardar</button> 
</form>
</div>
@endsection