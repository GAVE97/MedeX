@extends('layouts.Doc')

@section('title', 'Reporte')

<div class="col">
    <img src="data:image/svg+xml;base64, {{base64_encode($valor)}}"><br>
    <FONT SIZE=-1>Codigo para buscar el equipo en el inventario.</FONT>
</div>

@section('content')