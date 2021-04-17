@extends('layouts.appComun')

@section('title', 'Solicitudes')

@section('search')
<form action="{{route('filtrarSolicitudes')}}" class="form-inline my-2 my-lg-0" method="POST">
	@csrf
  <input class="form-control mr-sm-2" name="valor" id="valor" type="search" placeholder="Filtrar por..." aria-label="Search" aling="center">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
@endsection

@section('content')
<div class="container">    
    <div class="row">
        @foreach($Solicitudes as $Solicitud)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
            <div class="card">
                <h5 class="card-header">Reporte</h5>
                <div class="card-body">
                    <h5 class="card-title">Nombre: {{$Solicitud->Nombre}}</h5>

                    <p class="card-text"> Area: {{$Solicitud->Area}}<br>
                                          Fallo: {{$Solicitud->Descripcion_del_fallo}}<br>
                                          Observaciones: {{$Solicitud->Observaciones}}
                    </p>
                    
                    <a href="/Solicitud/{{$Solicitud->id}}" class="btn btn-primary">Ir al formato</a>
                </div>
            </div>
        </div>
        @endforeach    
    </div>
    </div>   
@endsection