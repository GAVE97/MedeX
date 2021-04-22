@extends('layouts.appComun')
@section('title', 'Add Inventario')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AÑADIR UN EQUIPO</h4>
  <p> En este apartado se debera colocar la infomación requerida para agragar un nuevo equipo al inventario.</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Equipos" enctype="multipart/form-data">
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    <div class="col">
        <div class="row">
            <div class="col"> 
                    <!--label class="mt-2">Código</label>
                <input type="string" name="ID_inventario" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" class="form-control" placeholder="Número de identificación de inventario" required-->
                    <label class="mt-2">Nombre</label>
                <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Nombre del equipo" required>           
                    <label class="mt-2">Área</label>
                <input type="string" name="Area" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Área de asignada para el equipo" required>          
                    <label class="mt-2">Tipo de equipo</label>
                <input type="string" name="Tipo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Tipo de equipo" required>
                    <label class="mt-2">Marca</label>
                <select class="custom-select mr-sm-4" type="string"  name="Marca" id="inlineFormCustomSelectPref" required>
                        @foreach($Marcas as $Marca)
                            <option value="{{$Marca->NombreMrk}}">{{$Marca->NombreMrk}}</option>
                        @endforeach
                </select>
                    <label class="mt-2">Modelo</label>
                <input type="string" name="Modelo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Modelo del equipo" required>
            </div>
            <div class="col">
                    <label class="mt-2">Número de serie</label>
                <input type="string" name="Num_de_serie" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Número de serie proporcionado por el fabricante" required>
                    <label class="mt-2">Ubicación</label>
                <input type="string" name="Ubicacion" pattern="[A-Za-z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Ubicación física en el centro de atención sanitaria" required>
                    <label class="mt-2">Estatus operativo</label> <!-- que tenga tres opciones -->           
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
                    <label for="start" class="mr-2">Fecha de vencimiento de la Garantia:</label>
                <input type="date" min=<?php 
                                        echo date('Y-m-d'); 
                                        ?>                    id="start" name="vencimientoGarantia" required>
            
                <!-- que tenga opciones 220-110-380 -->
                    <label class="mr-4 " for="inlineFormCustomSelectPref">Alimentación electrica</label>
                <select class="custom-select mr-sm-4" type="string" name="Consumo_electrico" id="inlineFormCustomSelectPref" required>
                    <option value="110V">110V</option>
                    <option value="220V">220V</option>
                    <option value="380V">380V</option>
                    <option value="N/A">No aplicable</option>
                </select>
            </div>
            <br>
        </div>
    </div>
    <label class="mt-2">Mantenimiento</label>
            <select class="custom-select mr-sm-4" type="string" name="Mnto" id="inlineFormCustomSelectPref"  required>
                    @foreach($Mntos as $Mnto)
                        <option value="{{$Mnto->NombreMnto}}">{{$Mnto->NombreMnto}}</option>
                    @endforeach
            </select> <br><br><br>
</div>
<div class="container-sm">    
    <!-- Guardado de imagen del equipo -->
    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center"><br/>


        
        <label class="mr-4 my-2" for="inlineFormCustomSelectPref">EVALUACIÓN CLÍNICA-TÉCNICA</label> <br>
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
            <option value="3">Promedio:verificación del desempeño y pruebas de seguridad</option>
            <option value="2">Inferiores al promedio</option>
            <option value="1">Minimos: inspección visual</option>

        </select>
        <!-- fin Modelo de Fennigkoh y Smith -->
        <label class="mt-2 mr-2" for="start">Fecha del mantenimiento anterior:</label>
        <input type="date" max=
        <?php 
        echo date('Y-m-d'); 
        ?> id="start" name="ultimoMantenimiento" required>
        <label>Foto del equipo</label> <br/>
        <input type="file" name="imagenEquipo" required>
        </div>
    </div>           
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-auto" aling="text-center">
             <br/> <br/>
            
    </div>           
    </div>
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
                        ¿Esta seguro de querer guardar este equipo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    
</div>
</form>
@endsection