@extends('layouts.appComun')
@section('title', 'editEquipo')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">EDITAR UN EQUIPO</h4>
  <p> En este apartado se debera colocar la infomación requerida para agragar un nuevo equipo al inventario.</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Equipos/{{$Equipo->ID_inventario}}" enctype="multipart/form-data">
@method('PUT')
@csrf
<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="row">
    <div class="col"> 

        <label class="mt-2">Código</label>
        <input type="string" name="ID_inventario" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" class="form-control" value="{{$Equipo->ID_inventario}}" required>

        <label class="mt-2">Nombre</label>
        <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Equipo->Nombre}}" required>
        
        <label class="mt-2">Área</label>
        <input type="string" name="Area" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Equipo->Area}}" required>
        
        <label class="mt-2">Tipo de equipo</label>
        <input type="string" name="Tipo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Equipo->Tipo}}" required>

        <label class="mt-2">Marca</label>
        <select class="custom-select mr-sm-4" type="string"  name="Marca" id="inlineFormCustomSelectPref" value="{{$Equipo->Marca}}" required>
                @foreach($Marcas as $Marca)
                    <option value="{{$Marca->NombreMrk}}">{{$Marca->NombreMrk}}</option>
                @endforeach
        </select>

        <label class="mt-2">Modelo</label>
        <input type="string" name="Modelo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" value="{{$Equipo->Modelo}}" required>

         <!--div class="slider-wrapper">
            <label class="mt-2">Porcentaje de uso</label></br>
            <input type="range" list="tickmarks" name="porcentUso" value="{{$Equipo->porcentUso}}" step="0.1">
                <datalist id="tickmarks">
                    <option value="0">
                    <option value="10">
                    <option value="20">
                    <option value="30">
                    <option value="40">
                    <option value="50">
                    <option value="60">
                    <option value="70">
                    <option value="80">
                    <option value="90">
                    <option value="100">
                </datalist>
        </div-->

    </div>
    <div class="col">

        <label class="mt-2">Número de serie</label>
        <input type="string" name="Num_de_serie" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Equipo->Num_de_serie}}" required>

        <label class="mt-2">Ubicación</label>
        <input type="string" name="Ubicacion" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Equipo->Ubicacion}}" required>

        <label class="mt-2">Estatus operativo</label> <!-- que tenga dos opciones -->
        
        <div class="row ml-4 mb-2">
            <div class="col mt-2">
                <input class="form-check-input" type="radio" name="Estatus" value="Activo" checked required>
                <label class="form-check-label" for="exampleActivo">Activo</label>
            </div>
            <div class="col mt-2">
                <input class="form-check-input" type="radio" name="Estatus"  value="Inactivo" required>
                <label class="form-check-label" for="exampleInactivo">Inactivo</label>
            </div>
            <div class="col mt-2">
                <input class="form-check-input" type="radio" name="Estatus"  value="En mantenimiento" required>
                <label class="form-check-label" for="exampleInactivo">En mantenimiento</label>
            </div>
        </div>

        <label class="mt-2">Garantía</label> <!-- que tenga fecha -->
        <div class="row ml-2 mb-2">
        <label for="start">Fecha de vencimiento de la Garantia:</label>
        <input type="date" min=
        <?php 
        echo date('Y-m-d'); 
        ?> id="start" name="vencimientoGarantia" value="{{$Equipo->vencimientoGarantia}}" required>
       </div>



        <label class="mt-2">Alimentación electrica</label> <!-- que tenga opciones 220-110-380 -->
        <form class="form-inline">
        <label class="mr-4" for="inlineFormCustomSelectPref">Preferente</label>
        <select class="custom-select mr-sm-4" type="string" name="Consumo_electrico" id="inlineFormCustomSelectPref" required>
         <option value="110V">110V</option>
         <option value="220V">220V</option>
         <option value="380V">380V</option>
         <option value="N/A">No aplicable</option>
         </select>

         <label class="mt-2">Mantenimiento</label>
        <select class="custom-select mr-sm-4" type="string" name="Mnto" id="inlineFormCustomSelectPref" value="{{$Equipo->Mnto}}" required>
                @foreach($Mntos as $Mnto)
                    <option value="{{$Mnto->NombreMnto}}">{{$Mnto->NombreMnto}}</option>
                @endforeach
        </select>

        <label class="mt-2 mr-2" for="start">Fecha del mantenimiento anterior:</label>
        <input type="date" max=
        <?php 
        echo date('Y-m-d'); 
        ?> id="start" value="{{$Equipo->ultimoMantenimiento}}" name="ultimoMantenimiento" required>
       </div>

    </div>
    </div> 

    <!-- Guardado de imagen del equipo -->
    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center"><br/>
        <label>Foto del equipo</label> <br/>
    </div>           
    </div>

    
    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center">
        <input type="file" name="imagenEquipo"> <br/> <br/>
        
    <!-- Modelo de Fennigkoh y Smith -->
    <label class="mt-2">Función del equipo</label>
    <select class="custom-select mr-sm-4" type="string" name="funcionEq" id="inlineFormCustomSelectPref"  required>
        <option value="10">Soporte de vida</option>
        <option value="9">Cirugía y cuidados intensivos</option>
        <option value="8">Terapia fisica y tratamiento</option>
        <option value="7">Monitoreo qurúrgico y de cuidados intensivos</option>
        <option value="6">Otros equipos para el monitoreo de variables fisiológicaas y el diagnóstico</option>
        <option value="5">Laboratorio analítico</option>
        <option value="4">Accesorios de laboratorio</option>
        <option value="3">Sistema de cómputo y equipos asociados</option>
        <option value="2">Equipos relacionados con los pacientes y otros equipos</option>
    </select>

    <label class="mt-2">Riesgo asociado a la aplicación clínica</label>
    <select class="custom-select mr-sm-4" type="string" name="riesgoEq" id="inlineFormCustomSelectPref"  required>
        <option value="5">Posible muerte del paciente</option>
        <option value="4">Posible lesión del paciente o el usuario</option>
        <option value="3">Terapia inepropiada o falso diagnóstico</option>
        <option value="2">Daños en el equipo</option>
        <option value="1">No se detectan riesgos significativos</option>
    </select>

    <label class="mt-2">Requerimientos de mantenimiento</label>
    <select class="custom-select mr-sm-4" type="string" name="requerimientosEq" id="inlineFormCustomSelectPref"  required>
    <option value="5">Extensivo: calibración de rutina y reemplazo de partes</option>
        <option value="4">Superiores al promedio</option>
        <option value="3">Promedio:verificación del desempeñe y pruebas de seguridad</option>
        <option value="2">Inferiores al promedio</option>
        <option value="1">Minimos: inspección visual</option>

    </select>
    <!-- fin Modelo de Fennigkoh y Smith -->
    <!-- Evaluación clínica -->   
        <div>
            <fieldset>
                <legend>Frecuencia de uso</legend>
                <label>
                    <input type="radio" name="frecUso" value="0"> Ninguno
                </label>
                <label>
                    <input type="radio" name="frecUso" value="2"> Baja
                </label>
                <label>
                    <input type="radio" name="frecUso" value="4"> Mediana
                </label>
                <label>
                    <input type="radio" name="frecUso" value="6"> Alta
                </label>
                <label>
                    <input type="radio" name="frecUso" value="8"> Muy alta
                </label>
            </fieldset>

            <fieldset>
                <legend>Confiabilidad del equípo</legend>
                <label>
                    <input type="radio" name="confiabilidad" value="0"> Ninguno
                </label>
                <label>
                    <input type="radio" name="confiabilidad" value="2"> Baja
                </label>
                <label>
                    <input type="radio" name="confiabilidad" value="4"> Mediana
                </label>
                <label>
                    <input type="radio" name="confiabilidad" value="6"> Alta
                </label>
                <label>
                    <input type="radio" name="confiabilidad" value="8"> Muy alta
                </label>
            </fieldset>

            <fieldset>
                <legend>Facilidad de uso</legend>
                <label>
                    <input type="radio" name="facilidadUso" value="0"> Ninguno
                </label>
                <label>
                    <input type="radio" name="facilidadUso" value="2"> Baja
                </label>
                <label>
                    <input type="radio" name="facilidadUso" value="4"> Mediana
                </label>
                <label>
                    <input type="radio" name="facilidadUso" value="6"> Alta
                </label>
                <label>
                    <input type="radio" name="facilidadUso" value="8"> Muy alta
                </label>
            </fieldset>

            <fieldset>
                <legend>Contribución para el tratamiento </legend>
                <label>
                    <input type="radio" name="contribucionTratamiento" value="0"> Ninguno
                </label>
                <label>
                    <input type="radio" name="contribucionTratamiento" value="2"> Baja
                </label>
                <label>
                    <input type="radio" name="contribucionTratamiento" value="4"> Mediana
                </label>
                <label>
                    <input type="radio" name="contribucionTratamiento" value="6"> Alta
                </label>
                <label>
                    <input type="radio" name="contribucionTratamiento" value="8"> Muy alta
                </label>
            </fieldset>
        </div> 
    <!-- fin EC -->
    </div>           
    </div>

    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center">
                <!-- Button trigger modal -->
                <div class="row justify-content-md-center mt-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    CONTINUAR
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Esta seguro de querer guardar los cambios?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
    </div>           
    </div>
    
</div>
</form>
@endsection