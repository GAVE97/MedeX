@extends('layouts.appComun')

@section('title', 'Marcas')

@section('content')

<div class="container">    
    <div class="row">
        @foreach($Marcas as $Marca)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
            <div class="card text center" style="width: 14rem;">
                            <!--Añadir logos o fotos de las marcas-->
                <img src="imagenesEmpresas/{{$Marca->imagenMarca}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
                <div class="card-body">
                <h5 class="card-title">{{$Marca->NombreMrk}}</h5>
                
                <p class="card-text"> Numero: {{$Marca->No_tel}}<br>
                                        Correo electrónico: {{$Marca->email}}<br>
                                        Ubicación: {{$Marca->Ubicacion}}
                </p>

                <a href="/Equipos/{{$Marca->id}}" class="btn btn-primary">Ir al equipo</a>
                </div>
            </div> 
        </div>
        @endforeach    
    </div>
    </div>   
@endsection