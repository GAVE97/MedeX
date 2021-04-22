@extends('layouts.appComun')

@section('title', 'Empresas Mantenimiento')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">Empresas que brindan mantenimiento a equipos médicos</h4>
  <p>Estas empresas brindan servicios subrogados.</p>
  <hr>
  <p class="mb-0">Sea cuidadoso con la información.</p>
</div>


<div class="container">    
    <div class="row">
        @foreach($Mntos as $Mnto)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
                <div class="card text center" style="width: 14rem;">
                             <!--Añadir logos o fotos de las empresas de mantenimiento-->
                    <img src="imagenesEmpresas/{{$Mnto->imagenMnto}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
                    <div class="card-body">
                    <h5 class="card-title">{{$Mnto->Nombre}}</h5>
                    
                    <p class="card-text"> Numero: {{$Mnto->No_tel}}<br>
                                          Correo electrónico: {{$Mnto->email}}<br>
                                          Ubicación: {{$Mnto->Ubicacion}}
                    </p>

                    <a href="/Mantenimiento/{{$Mnto->NombreMnto}}" class="btn btn-primary">Ir al perfil</a>
                    </div>
                </div> 
        </div>
        @endforeach    
    </div>
</div>   
@endsection