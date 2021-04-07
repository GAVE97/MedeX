@extends('layouts.Doc')

@section('title', 'Reporte')

@section('content')

<table border='' width=100%>  <!-- Tabla del header: logos -->
    <tr>
        <td rowspan="5" width="15%"><img src="../public/images/diagnocentro2.jpg" height="90px" width="90px"alt="Sanatorio Muñoa logo">
        </td>
        <td rowspan="3" ><div align=center><img src="../public/images/diagnocentro22.jpg" height="70px" width="360px"alt="Sanatorio Muñoa logo"></div>
        </td>
        <td rowspan="5" width="15%"><img src="../public/images/diagnocentro1.jpg" height="90px" width="90px"alt="Sanatorio Muñoa logo">
    </tr>
    <tr>
        <!-- fila vacia -->    
    </tr>
    <tr>
        <!-- fila vacia -->
    </tr>
    <tr>
        <td rowspan="2"><div align=center><FONT SIZE=+1>NO. FOLIO: {{$Reporte->id}}</FONT></div>
        </td>
    </tr>
    <tr><!-- fila vacia -->    
    </tr>
</table>

<table border='' width=100%>  <!-- Tabla de información del formato -->
    <tr>
        <td> <div align=center><FONT SIZE=+1>ORDEN DE SERVICIO</FONT></div>
        </td>
    </tr>
    <tr>
        <td><div align=center><FONT SIZE=-1>Este documento se almacenará en la base de datos para garantizar
            <br/>una trazabilidad con respecto al funcionamiento del equipo descrito en la tabla.<br/>
            Los códigos QR redireccionaran a una página de validación dentro de la plataforma MEDEX.</FONT></div>
        </td>
    </tr>
    <tr>
        <td><br/>
        </td>
    </tr>
</table>

<table border='' width=100%>  <!-- Tabla con datos relevantes del equipo -->  
    <tr>
        <td width="10%">
        </td>
        <td width="45%">
            <div>
                <table class="table table-striped">  <!-- Tabla con datos del equipo -->
                    <thead>
                        <tr>
                        <th scope="col" colspan="2">DATOS DEL EQUIPO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">ID Equipo</th>
                        <td>{{$Reporte->ID_inv}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Nombre</th>
                        <td>{{$Reporte->Nombre}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Marca</th>
                        <td>{{$Reporte->Marca}}</td>
                        <tr>
                        <th scope="row">Modelo</th>
                        <td>{{$Reporte->Modelo}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Numero de série</th>
                        <td>{{$Reporte->Num_de_serie}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Area</th>
                        <td>{{$Reporte->Area}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Tipo</th>
                        <td>{{$Reporte->Tipo}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Ubicación</th>
                        <td>{{$Reporte->Ubicacion}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Mantenimiento brindado por:</th>
                        <td>{{$Reporte->Mnto}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </td>
        <td width="4%">
        </td>
        <td colspan="2">

        <table>  <!-- Tabla con datos del equipo -->
            <thead>
                <tr>
                <th scope="col" colspan="2">DATOS DEL SERVICIO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Tipo de servicio:
                <td>{{$Reporte->tipo_de_servicio}}</td>
                </tr>
                <tr>
                <th scope="row">Origen del fallo:</th>
                <td>{{$Reporte->origen_del_fallo}}</td>
                </tr>
                <tr>
                <th scope="row">Falla detectada:</th>
                <td>{{$Reporte->falla_detectada}}</td>
                <tr>
                <th scope="row">Actividades:</th>
                <td>{{$Reporte->actividades_realizadas}}</td>
                </tr>
                <tr>
                <th scope="row">Materiales:</th>
                <td>{{$Reporte->Materiales}}</td>
                </tr>
                <tr>
                <th scope="row">Articulos de limpieza:</th>
                <td>{{$Reporte->Artículos_de_limpieza}}</td>
                </tr>
                <tr>
                <th scope="row">Equipos de medición:</th>
                <td>{{$Reporte->Equipos_de_medicion}}</td>
                </tr>
                <tr>
                <th scope="row">Simuladores:</th>
                <td>{{$Reporte->simuladores}}</td>
                </tr>
                <tr>
                <th scope="row">Herramientas:</th>
                <td>{{$Reporte->Herramienta}}</td>
                </tr>
                <tr>
                <th scope="row">Estatus del servicios:</th>
                <td>{{$Reporte->estado_del_servicio}}</td>
                </tr>
            </tbody>
        </table>
            <!--table width=100%>  <-- Tabla descripción del fallo y observaciones ->
                <tr>
                    <td>Tipo de servicio:{{$Reporte->tipo_de_servicio}}</td></br>
                </tr>
                <tr>
                    <td>Origen del fallo:{{$Reporte->origen_del_fallo}}</td></br></br>
                </tr>
                <tr>
                    <td>Falla detectada:{{$Reporte->falla_detectada}}</td></br></br>
                </tr>
                <tr>
                    <td>Actividades:{{$Reporte->actividades_realizadas}}</td></br></br>
                </tr>
                <tr>
                    <td>Materiales:{{$Reporte->Materiales}}</td></br></br>
                </tr>
                <tr>
                    <td>Articulos de limpieza:{{$Reporte->Artículos_de_limpieza}}</td></br></br>
                </tr>
                <tr>
                    <td>Equipos de medición:{{$Reporte->Equipos_de_medicion}}</td></br></br>
                </tr>
                <tr>
                    <td>Simuladores:{{$Reporte->simuladores}}</td></br></br>
                </tr>
                <tr>
                    <td>Herramientas:{{$Reporte->Herramienta}}</td></br></br>
                </tr>
                <tr>
                    <td>Estatus del servicios:{{$Reporte->estado_del_servicio}}</td>
                </tr>
            </table-->
        </td>
    </tr>
</table>

<table border='' width=100%>  <!-- Tabla vacia de separación -->
    <tr>
        <td></br>
        </td>
    </tr>
</table>

<table border='' width=100%>  <!-- Códigos QR y firma -->
    <tr>
        <td width=25%>       
            <div class="col">
                <img src="data:image/svg+xml;base64, {{base64_encode($valor1)}}"><br>
                <FONT SIZE=-1>Validación de la Reporte.</FONT>
            </div>
        </td>
        <td>
            <table border='' width=100%>
                <tr>
                    <td rowspan=3>
                        <img src="../public/imagenesEmpresas/{{$Reporte->mntoLogo}}"  height="70px" width="70px" alt="marca logo">
                    </td>
                    <td>Mantenimiento: {{$Reporte->Mnto}}
                    </td>
                </tr>
                <tr>
                    <td>Tipo de servicio: {{$Reporte->tipo_de_servicio}}
                    </td>
                   
                </tr>
                <tr>
                    <td>Servicio hecho por: {{$Reporte->servDoneBy}}
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td></br>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td><div align=center>Firma</div>
                    </td>
                </tr>
            </table>
        </td>
        <td width=25%>
            <div class="col text-right">
                <img class="" src="data:image/svg+xml;base64, {{base64_encode($valor2)}}"><br>
                <FONT SIZE=-1>Validación del equipo.</FONT>
            </div>
        </td>
    </tr>
</table>

<table border='' width=100%>  <!-- Footer -->
    <tr>
        <td colspan="3"></br>
        </td>
    </tr>
    <tr>
        <td colspan="3"></br>
        </td>
    </tr>
    
    <tr>
        <td width="20%">
            <img src="../public/LOGO.png" height="50px" width=""alt="Sanatorio Muñoa logo">
        </td>
        <td>
            <FONT SIZE=-2>
                Fecah (aaaa/mm/dd) y hora: {{$Reporte->created_at}}<br/>
                Calle Tercera Ote. Sur 142, Col. Centro, San Roque, 29000 Tuxtla Gutiérrez, Chis.<br/>
                E-mail: sanatoriomunoa@diagnoscentro.com
            </FONT>
        </td>
        <td>
            <div align=center><FONT SIZE=+3>MEDEX</FONT></div>
        </td>
    </tr>
</table>
@endsection