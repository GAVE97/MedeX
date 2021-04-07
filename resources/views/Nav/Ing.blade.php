@extends('layouts.appComun')

@section('title', 'Ingeniero')

@section('content')

<!--divs Scroll container-->
<div class="container-fluid">
<div class="row justify-content-around">

<!--Scroll de equipos-->
<div class="box overflow-auto ">
    @foreach($Equipos as $Equipo)
        <div class="card text center mb-2" style="width: 14rem;">
            <img src="../imgInv/{{$Equipo->imagenEquipo}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
            <div class="card-body">
            <h5 class="card-title">{{$Equipo->Nombre}}</h5>
            <p class="card-text"> Modelo: {{$Equipo->Modelo}}<br>
                                    Fabricante: {{$Equipo->Fabricante}}<br>
                                    Estatus: {{$Equipo->Estatus}}<br>
                                    ID: {{$Equipo->ID_inventario}}<br>
                                    Área: {{$Equipo->Area}}<br>
                                    Ubicación: {{$Equipo->Ubicacion}}
            </p>
            <a href="/Equipos/{{$Equipo->ID_inventario}}" class="btn btn-primary">Ir al equipo</a>
            </div>
        </div> 
    @endforeach   
</div>
<!--Scroll de empresas de mantenimiento-->
<div class="box overflow-auto ">
    @foreach($Mntos as $Mnto)
        <div class="card text center mb-2" style="width: 13.95rem;">
                        <!--Añadir logos o fotos de las empresas de mantenimiento-->
            <img src="imgEmp/{{$Mnto->imagenMnto}}" height="200" width="200" class="card-img-top" alt="Imagen no soportada por el navegador">
            <div class="card-body">
            <h5 class="card-title">{{$Mnto->Nombre}}</h5>
            
            <p class="card-text"> Numero: {{$Mnto->No_tel}}<br>
                                    Correo electrónico: {{$Mnto->email}}<br>
                                    Ubicación: {{$Mnto->Ubicacion}}
            </p>

            <a href="/Equipos/{{$Mnto->ID_inventario}}" class="btn btn-primary">Ir al equipo</a>
            </div>
        </div> 
    @endforeach
</div>
<!--Scroll de manuales-->
<div class="box-manuales overflow-auto">

</div>

<!--End divs scroll container-->
</div>
</div>
@endsection