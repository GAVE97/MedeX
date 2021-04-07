@extends('layouts.appComun')

@section('title', 'Reportes')

@section('content')
<div class="container">    
    <div class="row">
        @foreach($Reportes as $Reporte)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
            <div class="card">
                <h5 class="card-header">Reporte</h5>
                <div class="card-body">
                    <h5 class="card-title">Nombre: {{$Reporte->ID_inv}}</h5>

                    <p class="card-text"> Servicio hecho por: {{$Reporte->servDoneBy}}<br>
                                          Acciones: {{$Reporte->Acciones}}<br>
                                          Observaciones: {{$Reporte->Observaciones}}
                    </p>
                    
                    <a href="/Reportes/{{$Reporte->id}}" class="btn btn-primary">Ir al formato</a>
                </div>
            </div>
        </div>
        @endforeach    
    </div>
    </div>   
@endsection