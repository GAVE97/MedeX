@extends('layouts.appComun')

@section('title', 'Empresas Mantenimiento')

@section('content')

<div class="container">    
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
                <div class="card text center" style="width: 14rem;">
                             <!--Añadir logos o fotos de las empresas de mantenimiento-->
                    <img src="../imagenesEmpresas/{{$Mnto->imagenMnto}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
                    <div class="card-body">
                    <h5 class="card-title">{{$Mnto->Nombre}}</h5>
                    
                    <p class="card-text"> Numero: {{$Mnto->No_tel}}<br>
                                          Correo electrónico: {{$Mnto->email}}<br>
                                          Ubicación: {{$Mnto->Ubicacion}}
                    </p>

                    <a href="/Mantenimiento/{{$Mnto->NombreMnto}}/edit" class="btn btn-primary">Editar</a>
                    <form class="form-group" method="POST" action="/Mantenimiento/{{$Mnto->NombreMnto}}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-secondary">Eliminar</button>
                    </form>
                    </div>
                </div> 
        </div>
    </div>
</div>   
@endsection