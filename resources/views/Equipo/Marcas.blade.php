@extends('layouts.appComun')

@section('title', 'Marcas')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">Marcas existentes</h4>
  <p>estas son las marcas de los equipos existentes.</p>
  <hr>
  <p class="mb-0">Sea cuidadoso con la información.</p>
</div>


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

                <a href="/Marcas/{{$Marca->NombreMrk}}" class="btn btn-primary">Ver marca</a>
                </div>
            </div> 
        </div>
        @endforeach    
    </div>
    </div>   
@endsection