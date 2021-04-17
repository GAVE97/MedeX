@extends('layouts.appComun')

@section('title', 'Equipo')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-2 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="../imgInv/{{$Equipo->imagenEquipo}}"class="card-img-top"  alt="Imagen no soportada por el navegador">
                    <div class="card-body">
                        <h5 class="card-title">{{$Equipo->Nombre}}</h5>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">ID: {{$Equipo->ID_inventario}}</li>
                        <li class="list-group-item">Área: {{$Equipo->Area}}</li>
                        <li class="list-group-item">Tipo: {{$Equipo->Tipo}}</li>
                        <li class="list-group-item">Marca: {{$Equipo->Marca}}</li>
                        <li class="list-group-item">Modelo: {{$Equipo->Modelo}}</li>
                        <li class="list-group-item">No. serie: {{$Equipo->Num_de_serie}}</li>
                        <li class="list-group-item">Ubicación: {{$Equipo->Ubicacion}}</li>
                        <li class="list-group-item">Estatus operativo: {{$Equipo->Estatus}}</li>
                        <li class="list-group-item">Vencimiento garantia: {{$Equipo->vencimientoGarantia}}</li>
                        <li class="list-group-item">Alimentacion electrica: {{$Equipo->Consumo_electrico}}</li>
                        <li class="list-group-item">Mantenimientos brindados por: {{$Equipo->Mnto}}</li>
                        <!--li class="list-group-item">Porcentaje de uso: {{$Equipo->porcentUso}}%</li-->
                        <li class="list-group-item">Prioridad: {{$Equipo->prioridad}}</li>
                        <li class="list-group-item">Último mantenimiento: {{$Equipo->ultimoMantenimiento}}</li>
                    </ul>
                        <div class="card-body">
                            <a href="/Equipos/{{$Equipo->ID_inventario}}/edit" class="btn btn-outline-primary" role="button">Editar</a>
                            <a class="btn btn-info mt-2" role="button" href="{{route('Solicitud.create')}}">Solicitar mantenimiento</a>
                            <form action="{{route('qr')}}" class="form-group mt-2" method="POST">
                                @csrf
                                <input class="form-control mr-sm-2" name="valor" id="valor" type="hidden" value="{{$Equipo->ID_inventario}}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Solicitar qr</button>
                            </form>
                            <form class="form-group mt-2" method="POST" action="/Equipos/{{$Equipo->ID_inventario}}" enctype="multipart/form-data">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                </div>
        </div>
        <div class="col-8 border" >
        <div class="justify-content-center"><h1>PPROXIMOS MANTENIMIENTOS</h1></div>
            <div class="row">
                @foreach($fechas as $fecha)
                <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-4 ml-4 mr-4" >
                    <div class="card" style="width: 18rem;">
                        <img src="../imgInv/{{$Equipo->imagenEquipo}}" class="card-img-top"  alt="Imagen no soportada por el navegador">
                        <div class="card-body"> <h5 class="card-title">{{$Equipo->Nombre}}</h5>
                        </div>
                        <div class="card-body"> <h3>{{$fecha}}</h3>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div> 
            <a class="nav-link" href="{{route('navegacion')}}">Navegación</a>
        </div>
    </div>
</div>   
@endsection