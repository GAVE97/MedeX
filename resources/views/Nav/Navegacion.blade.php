@extends('layouts.appComun')

@section('title', 'NAVEGACIÓN')

@section('content')

<div class="container content center">
    <!-- INDICACIONES DE LA VISTA-->
    <div class="container-sm alert alert-primary" role="alert">
    <h4 class="alert-heading">Vista de navegación general</h4>
    <p>Este esquema te permitirá redirigiste a cualquier lugar de la pagina</p>
    <hr>
    <p class="mb-0"></p>
    </div>


    <div class="row center">
        <div class="col-sm">
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Equipos.index')}}">Inventario</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Solicitud.index')}}">Solicitudes de mantenimiento</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Reportes.index')}}">Reportes de mantenimiento</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Marcas.index')}}">Marcas</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Mantenimiento.index')}}">Servicios externos</a></br>
        </div>

        <div class="col-sm">
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Equipos.create')}}">Nuevo equipo</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Solicitud.create')}}">Nueva solicitud de mantenimiento</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Reportes.create')}}">Nuevo reporte de mantenimiento</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Marcas.create')}}">Agregar nueva marca</a></br>
            <a class="btn btn-outline-info btn-lg btn-block mt-2" href="{{route('Mantenimiento.create')}}">Agregar proveedor de servicios</a></br>
        </div> 
    </div>

</div>
@endsection