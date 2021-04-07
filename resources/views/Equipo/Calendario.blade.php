@extends('layouts.appComun')

@section('title', 'Equipo')

@section('content')
<div class="container"> 
   <div class="row">
        @foreach($fechas as $fecha)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4 ml-4 mr-4" >
            <div class="card" style="width: 18rem;">
            <img src="../imgInv/{{$Equipo->imagenEquipo}}"class="card-img-top"  alt="Imagen no soportada por el navegador">
            <div class="card-body">
                <h5 class="card-title">{{$Equipo->Nombre}}</h5>
            </div>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{$Equipo->ID_inventario}}</li>
                <li class="list-group-item">Área: {{$Equipo->Area}}</li>
                <li class="list-group-item">Fabricante: {{$Equipo->Fabricante}}</li>
                <li class="list-group-item">Modelo: {{$Equipo->Modelo}}</li>
                <li class="list-group-item">No. serie: {{$Equipo->Num_de_serie}}</li>
                <li class="list-group-item">Ubicación: {{$Equipo->Ubicacion}}</li>
                <li class="list-group-item">Estatus operativo: {{$Equipo->Estatus}}</li>
            </ul>
                <div class="card-body"><h1>{{$fecha}}</h1>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
    <a class="nav-link" href="{{route('navegacion')}}">Navegación</a>
</div>   
@endsection