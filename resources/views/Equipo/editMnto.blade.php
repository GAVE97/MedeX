@extends('layouts.appComun')
@section('title', 'editMnto')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AGREGAR UNA EMPRESA DE MANTENIMIENTO</h4>
  <p>En este apartado agregue una empresa que brinde mantenimiento de equipo médico.</p>
  <hr>
  <p class="mb-0">sea cuidadoso con la información, revise antes de guardar.</p>
</div>

<!-- Formulario para agregar empresa de mantenimiento -->
<form class="form-group" method="POST" action="/Mantenimiento/{{$Mnto->NombreMnto}}" enctype="multipart/form-data">
    @method('PUT') 
    @csrf


    <!-- Información de la empresa -->
    <div class="container-sm" class="form-group">
        <div class="col mt-4" >
            <label for="">Empresa</label>
            <input type="string" name="NombreMnto" class="form-control" value="{{$Mnto->NombreMnto}}" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" title="En este campo solo se aceptan caracteres alfanumericos" required>

            <label class="mt-2" for="">Ubicación</label>
            <input type="string" name="Ubicacion" class="form-control" value ="{{$Mnto->Ubicacion}}" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" required >

            <label class="mt-2" for="">Número</label>
            <input type="string" name="No_tel" class="form-control" value="{{$Mnto->No_tel}}" pattern="[0-9]{10}$" required>

            <label class="mt-2" for="">e-mail</label>
            <input pattern="[a-z 0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="string" name="email" class="form-control" value="{{$Mnto->email}}" required><br/>

            <!-- Guardado de imagen del equipo -->
            <label for="">Foto de la empresa de mantenimiento</label> <br/>
            <input type="file" name="imagenMnto" accept="image/png, image/jpeg" ><br/><br/>


                <!-- Button trigger modal -->
                <div class="row justify-content-md-center mt-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    CONTINUAR
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
                                    ¿Esta seguro de querer guardar los cambios?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</form>
@endsection