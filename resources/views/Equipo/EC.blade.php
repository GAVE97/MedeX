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

    <div class="container-sm">

        
        <!-- Evaluación clínica -->   
            <div class="row justify-content-md-center mt-4">
                <ul>
                    <li><fieldset>
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
                    </fieldset></li>

                    <li><fieldset>
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
                    </fieldset></li>

                    <li><fieldset>
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
                    </fieldset></li>

                    <li><fieldset>
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
                    </fieldset></li>
                </ul>
            </div> 
        <!-- fin EC -->
    </div>
</form>