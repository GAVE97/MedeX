@extends('layouts.appComun')
@section('title', 'Agregar Marca')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AGREGAR UNA NUEVA MARCA O FABRICANTE DE EQUIPO MÉDICO</h4>
  <p>En este apartado debes agregar los datos de la nueva marca o fabricante del equipo y subir una imagen del mismo.</p>
  <hr>
  <p class="mb-0">Sea cuidadoso con la información, revise antes de guardar.</p>
</div>

<!-- Formulario para agregar empresa de marcas -->
<form class="form-group" method="POST" action="/Marcas" enctype="multipart/form-data">
    @csrf
    
    <!-- Información de la marca -->
    <div class="container-sm" class="form-group">
        <div class="col mt-4" >
            <label for="">Marca</label>
            <input type="string" name="NombreMrk" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Nombre de la empresa" required>

            <label class="mt-2" for="">Ubicación</label>
            <input type="string" name="Ubicacion" class="form-control" placeholder="Dirección de la empresa" pattern="[A-Za-z0-90-9._%#+-  áéíóúÑñüäàè\s]*" required >

            <label class="mt-2" for="">Número</label>
            <input type="string" name="No_tel" class="form-control" placeholder="Numero de contacto de la empresa" pattern="[0-9]{10}$" required>

            <label class="mt-2" for="">e-mail</label>
            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="string" name="email" class="form-control" placeholder="Correo electrónico de la empresa" required><br/>
            
            <!-- Guardado de imagen del equipo -->
            <label for="">Foto del equipo</label> <br/>
            <input type="file" name="imagenMarca" pattern="[A-Za-z0-9]+" id="docpicker" accept="image/jpg , image/.png" required><br/> <br/>

            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        </div>
    </div>

</form>
@endsection