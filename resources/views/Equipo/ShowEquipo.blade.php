@extends('layouts.appComun')

@section('title', 'Equipo')

@section('content')
<div class="container">    
        <div class="card" style="width: 18rem;">
        <img src="../imgInv/{{$Equipo->imagenEquipo}}"class="card-img-top"  alt="Imagen no soportada por el navegador">
        <div class="card-body">
            <h5 class="card-title">{{$Equipo->Nombre}}</h5>
        </div>
        
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$Equipo->Descripción}}</li>
            <li class="list-group-item">ID: {{$Equipo->ID_inventario}}</li>
            <li class="list-group-item">Área: {{$Equipo->Area}}</li>
            <li class="list-group-item">Tipo: {{$Equipo->Tipo}}</li>
            <li class="list-group-item">Fabricante: {{$Equipo->Fabricante}}</li>
            <li class="list-group-item">Modelo: {{$Equipo->Modelo}}</li>
            <li class="list-group-item">No. serie: {{$Equipo->Num_de_serie}}</li>
            <li class="list-group-item">Ubicación: {{$Equipo->Ubicacion}}</li>
            <li class="list-group-item">Estatus operativo: {{$Equipo->Estatus}}</li>
            <li class="list-group-item">Consumo electrico: {{$Equipo->Consumo_electrico}}</li>
            <li class="list-group-item">Requisitos: {{$Equipo->Requisitos}}</li>
        </ul>
            <div class="card-body">
                <a href="/Equipos/{{$Equipo->ID_inventario}}/edit" class="card-link">Editar</a>
                <form class="form-group" method="POST" action="/Equipos/{{$Equipo->ID_inventario}}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-secondary">Eliminar</button>
                </form>
            </div>
        </div>
</div>   
@endsection