@extends('layouts.appComun')

@section('title', 'Inventario')

@section('search')
<form action="{{route('filtrarInventario')}}" class="form-inline my-2 my-lg-0" method="POST">
	@csrf
  <input class="form-control mr-sm-2" name="valor" id="valor" type="search" placeholder="Filtrar por..." aria-label="Search" aling="center">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
@endsection

@section('content')
<div class="container">    
    <div class="row">
        @foreach($Equipos as $Equipo)
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4" >
                <div class="card text center" style="width: 14rem;">
                    <img src="../imgInv/{{$Equipo->imagenEquipo}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
                    <div class="card-body">
                    <h5 class="card-title">{{$Equipo->Nombre}}</h5>
                    
                    <p class="card-text"> Modelo: {{$Equipo->Modelo}}<br>
                                          Fabricante: {{$Equipo->Marca}}<br>
                                          Estatus: {{$Equipo->Estatus}}<br>
                                          ID: {{$Equipo->ID_inventario}}<br>
                                          Área: {{$Equipo->Area}}<br>
                                          Ubicación: {{$Equipo->Ubicacion}}
                    </p>

                    <a href="/Equipos/{{$Equipo->ID_inventario}}" class="btn btn-primary">Ir al equipo</a>
                    </div>
                </div> 
        </div>
        @endforeach    
    </div>
</div>   
@endsection