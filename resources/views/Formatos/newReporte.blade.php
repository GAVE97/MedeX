@extends('layouts.appComun')
@section('title', 'Nuevo reporte')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">GENERAR NUEVO REPORTE DE MANTENIMIENTO</h4>
  <p>Coloque en este apartado la información requerida para generar un nuevo reporte de mantenimiento, sea cuidadoso con la información y verifique antes de guardar.</p>
  <hr>
  ¡Esta hoja de servicio debe estar suficientemente detallada en los campos abiertos!
</div>
<!--
    tipo de servicio
	origen de la falla
	falla detectada
	servicio realizado(mini bitacora)
-->
<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Reportes" enctype="multipart/form-data">
    @csrf
    
    <!-- Información del equipo-->
    <div class="container-sm" class="form-group">
            <div class="col mt-4">
            <label class="mt-2">Tipo de servicio</label>
            <select class="custom-select mr-sm-4" type="string" name="tipo_de_servicio" id="inlineFormCustomSelectPref" required>
                <option value="mantenimiento preventivo interno">Mantenimiento preventivo interno</option>
                <option value="mantenimiento preventivo externo">Mantenimiento preventivo externo</option>
                <option value="mantenimiento correctivo interno">Mantenimiento correctivo interno</option>
                <option value="mantenimiento correctivo externo">Mantenimiento correctivo externo</option>
                <option value="instalacion de equipo">Instalación de equipo</option>
                <option value="prestamo de equipo">prestamo de equipo</option>
                <option value="capacitacion">capacitación</option>
                <option value="entrega de comsumibles/refacciones/accesorios">Entrega de Refacción</option>
            </select>
            <label class="mt-2">Origen del fallo</label>
            <select class="custom-select mr-sm-4" type="string" name="origen_del_fallo" id="inlineFormCustomSelectPref" required>
                <option value="Deterioro de uso normal">Deterioro de uso normal</option>
                <option value="Operacion">Operación</option>
                <option value="Ninguna">Ninguna</option>
                <option value="Condiciones externas">Condiciones externas</option>
                <option value="Especifica">Específica<input type="string" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" name="origen_del_fallo_especifico" class="form-control" placeholder="Específica (*Anotar el caso)"></option>
            </select>
            <label class="mt-2">Falla detectada</label>
            <input type="string" name="falla_detectada" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="causa del fallo, origen del error" required>
            <label class="mt-2">Actividades realizadas</label>
            <input type="longText" name="actividades_realizadas" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Descripción concisa" required>

            <label class="mt-2">Materiales</label>
            <input type="string" name="Materiales" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Lubricante, electrónicos, etc." required>
            <label class="mt-2">Artículos de limpieza/higiene </label>
            <input type="string" name="Artículos_de_limpieza" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Cubrebocas, gasas, etc." required>
            <label class="mt-2">Equipos de medicion</label>
            <input type="string" name="Equipos_de_medicion" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Multímetro, manometro, termometro, etc." required>
            <label class="mt-2">Simuladores</label>
            <input type="string" name="simuladores" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Simuladores, probador de descargas, N/A" required> 
            <label class="mt-2">Herramienta</label>
            <input type="string" name="Herramienta" pattern="[A-Za-z0-9]+" class="form-control" placeholder="Desarmador, taladro, cautin, etc.">
            <label class="mt-2">estado del servicio</label>
            <input type="string" name="estado_del_servicio" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Concluído / No concluido: (especificar)" required>
            
            <label class="mt-2">Mantenimiento externo por:</label> 
            <select class="custom-select mr-sm-4" type="string" name="nombre_Mnto" id="inlineFormCustomSelectPref" required>
                @foreach($Mntos as $Mnto)
                    <option value="{{$Mnto->NombreMnto}}">{{$Mnto->NombreMnto}}</option>
                @endforeach
            </select>

            <label class="mt-2">Código</label>
            <input type="string" name="ID_inv" class="form-control" pattern="[a-zA-Z0-9._%+- ]*" placeholder="Número de identificación de inventario del equipo" required>
            <label class="mt-2">Servicio realizado por</label>
            <input type="string" name="servDoneBy" class="form-control" pattern="[a-zA-Z áéíóúÑñüäàè\s]*" placeholder="Persona que se encargó de relaizar el servicio" required>
            <label class="mt-2">Acciones tomadas</label>
            <input type="string" name="Acciones" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="Tareas que se llevaron a cabo para realizar el mantenimiento" required>
            <label class="mt-2">Observaciones</label>
        	<input type="longText" name="Observaciones" class="form-control" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" placeholder="*Acontecimientos fuera de lo normal o de relevancia" required>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
            Continuar
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
                            ¿Está seguro de proseguir con el reporte de mantenimiento?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Ir al PDF</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection