@extends('layouts.{{$Equipo->Modelo}}')
@section('title', 'Nueva Bitácora')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">GENERAR UNA NUEVA SOLICITUD DE MANTENIMIENTO</h4>
  <p>En este apartado podras generar una solicitud de mantenimiento.</p>
  <hr>
  <p class="mb-0">¡Sea cuidadoso! Verifique la información antes de guardar.</p>
</div>

<div class="row mt-4 mb-4 justify-content-md-center">
    <!-- Button PDF -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Bitácora en imagen
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
<!-- Form -->
<form class="form-group" method="POST" action="/Bitacoras" enctype="multipart/form-data">
            @csrf
            <div class="container-sm">
            <div class="form-group">
                <div class="row ml-4 mb-2">
                    <div class="col mt-2">
                        <input class="form-check-input" type="radio" name="Tipo" value="Imagen" checked  disabled>
                        <label class="form-check-label" for="exampleActivo">Imagen</label>
                    </div>
                    <div class="col mt-2">
                        <input class="form-check-input" type="radio" name="Tipo" value="Datos" disabled>
                        <label class="form-check-label" for="exampleInactivo">Datos</label>
                    </div>
                </div>
                <label class="mt-2" for="">Código</label>
                <input type="string" name="ID_inv" class="form-control" placeholder="Número de identificación de inventario del equipo">
                <label class="mt-2" for="">Descripción del fallo</label>
                <input type="longText" name="Descripcion_del_fallo" class="form-control" placeholder="Descripcion del error o mal funcionamiento del equipo" required>
                <label class="mt-2" for="">Observaciones</label>
                <input type="longText" name="Observaciones" class="form-control" placeholder="Estado de los cables, de la carcasa del equipo, de los botones, etc." required>	
            </div>                          
            </div>
</form>
<!-- End form -->   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="row mt-4 justify-content-md-center">
    <!-- Button bitácora digital -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Bitácora en datos digitales
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
<!-- Form -->
<form class="form-group" method="POST" action="/Bitacoras" enctype="multipart/form-data">
            @csrf
            <div class="container-sm">
            <div class="form-group">
                <div class="row ml-4 mb-2">
                    <div class="col mt-2">
                        <input class="form-check-input" type="radio" name="Tipo" value="Imagen" disabled>
                        <label class="form-check-label" for="exampleActivo">Activo</label>
                    </div>
                    <div class="col mt-2">
                        <input class="form-check-input" type="radio" name="Tipo" value="Datos" checked disabled>
                        <label class="form-check-label" for="exampleInactivo">Inactivo</label>
                    </div>
                </div>
                <label class="mt-2" for="">Código del equipo</label>
                <input type="string" name="Equipo" class="form-control" placeholder="Número de identificación de inventario del equipo">
                <label class="mt-2" for="">Descripción del fallo</label>
                <input type="longText" name="Descripcion_del_fallo" class="form-control" placeholder="Descripcion del error o mal funcionamiento del equipo">
                <label class="mt-2" for="">Observaciones</label>
                <input type="longText" name="Observaciones" class="form-control" placeholder="Estado de los cables, de la carcasa del equipo, de los botones, etc.">	
            </div>                               
            </div>
</form>
<!-- End form --> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection