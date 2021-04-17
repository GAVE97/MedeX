@extends('layouts.appComun')

@section('title', 'NAVEGACIÓN')

@section('content')

<div class="container content center">
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">Vista de navegación general</h4>
  <p>este esquema te permitirá redirigiste a cualquier lugar de la pagina</p>
  <hr>
  <p class="mb-0"></p>
</div>


<div class="row center">
    <div class="col-sm">
        <a href="{{route('Equipos.index')}}">Inventario</a></br>
        <a href="{{route('Solicitud.index')}}">Solicitudes</a></br>
        <a href="{{route('Reportes.index')}}">Reportes de servicio</a></br>
        <a href="{{route('Marcas.index')}}">Marcas de equipo médico</a></br>
        <a href="{{route('Mantenimiento.index')}}">Servicios de mantenimiento</a></br>
        <!--a href="{{route('Bitacoras.index')}}">Bitácoras</a--></br>
        <!--a href="{{route('manuales.index')}}">Manuales</a--></br>
        <!--form class="mt2" method="get" action="Equipos">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Inventario</button>
        </form>
        <form class="mt2" method="get" action="/Solicitud">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Solicitudes</button>
        </form>
        <form class="mt2" method="get" action="/Reportes">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Reportes de servicio</button>
        </form>
        <form class="mt2" method="get" action="/Marcas/">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Marcas de equipo médico</button>
        </form>
        <form class="mt2" method="get" action="/Mantenimiento">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Servicios de mantenimiento</button>
        </form>
        <form class="mt2" method="get" action="/Bitacoras/">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Bitácoras</button>
        </form>
        
        <form class="mt2" method="get" action="/manuales">
            <button type="button" class="btn btn-secondary btn-lg btn-block">Manuales</button>
        </form-->
    </div>
    <div class="col-sm">
        <a href="{{route('Equipos.create')}}">Nuevo equipo</a></br>
        <a href="{{route('Solicitud.create')}}">Nueva solicitud</a></br>
        <a href="{{route('Reportes.create')}}">Nuevo reporte</a></br>
        <a href="{{route('Marcas.create')}}">Nueva marca</a></br>
        <a href="{{route('Mantenimiento.create')}}">Nuevos servicios</a></br>
        <!--a href="{{route('Bitacoras.create')}}">Nueva bitácoras</a--></br>
        <!--a href="{{route('manuales.create')}}">Nuevo Manual</a--></br>
        <!--form class="mt2" method="get" action="/Equipo/create">
            <button type="button" class="btn btn-primary btn-lg btn-block">Nuevo equipo</button>
        </form>
        <form class="mt2" method="get" action="/Solicitud/create">
            <button type="button" class="btn btn-primary btn-lg btn-block">Nueva solicitud</button>
        </form>
        <form class="mt2" method="get" action="/Reportes/create">
            <button type="button" class="btn btn-primary btn-lg btn-block">Nuevo reporte</button>
        </form>
        
        <form class="mt2" method="get" action="/Marcas/create">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar marca</button>
        </form>
        
        <form class="mt2" method="get" action="/Mantenimiento/create">
            <button type="button" class="btn btn-primary btn-lg btn-block">Agregar nuevo servicio</button>
        </form>
        <form class="mt2" method="get" action="/Bitacoras/create">
            <button type="button" class="btn btn-primary btn-lg btn-block">Nueva bitácora</button>
        </form>
        <form class="mt2" method="get" action="/welcome">
            <button type="button" class="btn btn-primary btn-lg btn-block">WELCOME</button>
        </form-->
    </div> 
</div>

<form class="form-group" method="GET" action="/FrecuenciaMP" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="mt-2" for="">Código de inventario del equipo</label>
        <input type="string" name="ID_inventario" class="form-control" placeholder="Número de identificación de inventario del equipo">
    </div>
    <button type="submit" class="btn btn-secondary">Frecuencia de mantenimiento</button>
</form>

</div>
@endsection