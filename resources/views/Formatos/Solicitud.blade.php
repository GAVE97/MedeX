@extends('layouts.Doc')

@section('title', 'Solicitud')

@section('content')

<table width=100%>  <!-- Tabla del header: logos -->
    <tr>
        <td rowspan="5" width="15%"><img src="../public/images/diagnocentro2.jpg" height="90px" width="90px"alt="Sanatorio Muñoa logo">
        </td>
        <td rowspan="3" ><div align=center><img src="../public/images/diagnocentro22.jpg" height="70px" width="360px"alt="Sanatorio Muñoa logo"></div>
        </td>
        <td rowspan="5" width="15%"><img src="../public/images/diagnocentro1.jpg" height="90px" width="90px"alt="Sanatorio Muñoa logo">
    </tr>
    <tr>
        <!-- Tabla vacia -->
    </tr>
    <tr>
        <!-- Tabla vacia -->
    </tr>
    <tr>
        <td rowspan="2"><div align=center><FONT SIZE=+1>NO. FOLIO: {{$Solicitud->id}}</FONT></div>
        </td>
    </tr>
    <tr>  
        <!-- Tabla vacia -->
    </tr>
</table>

<table  width=100% >  <!-- Tabla de información del formato -->
    <tr>
        <td> <div align=center><FONT SIZE=+1>SOLICITUD DE MANTENIMIENTO DE EQUIPO MÉDICO</FONT></div>
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

<table  width=100% >  <!-- Tabla con datos relevantes del equipo -->  
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
                        <td>{{$Solicitud->ID_inv}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Nombre</th>
                        <td>{{$Solicitud->Nombre}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Marca</th>
                        <td>{{$Solicitud->Marca}}</td>
                        <tr>
                        <th scope="row">Modelo</th>
                        <td>{{$Solicitud->Modelo}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Numero de série</th>
                        <td>{{$Solicitud->Num_de_serie}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Area</th>
                        <td>{{$Solicitud->Area}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Tipo</th>
                        <td>{{$Solicitud->Tipo}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Ubicación</th>
                        <td>{{$Solicitud->Ubicacion}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Mantenimiento brindado por:</th>
                        <td>{{$Solicitud->Mnto}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </td>
        <td width="4%">
        </td>
        <td colspan="2" align=top>
            <table width=100% >  <!-- Tabla descripción del fallo y observaciones -->
                <tr>
                    <td> <FONT SIZE=+1.8>Reportó:{{$Solicitud->reportadoPor}}</FONT>
                    </td>
                </tr>
                <tr>
                    <td>DESCRIPCION DEL FALLO:<br/>{{$Solicitud->Descripcion_del_fallo}}
                    </td>
                </tr>
                <tr>
                    <td>OBSERVACIONES:<br/>{{$Solicitud->Observaciones}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table  width=100%>  <!-- Tabla vacia de separación -->
    <tr>
        <td><br/>
        </td>
    </tr>
</table>

<table  width=100%>  <!-- Códigos QR y firma -->
    <tr>
        <td width=25%>       
            <div class="col">
                <img src="data:image/svg+xml;base64, {{base64_encode($valor1)}}"><br>
                <FONT SIZE=-1>Validación de la solicitud.</FONT>
            </div>
        </td>
        <td>
            <table width=100%>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr><hr width=86%>
                <tr>
                    <td> <div class="ml-2">Frima.
                    </div> 
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

<table width=100%>  <!-- Tabla del footer -->
    <tr>
        <td colspan="3"><br/><br/>
        </td>
    </tr>
    
    <tr>
        <td width="20%">
            <img src="../public/LOGO.png" height="50px" width=""alt="Sanatorio Muñoa logo">
        </td>
        <td>
            <FONT SIZE=-2>
                Fecah (aaaa/mm/dd) y hora: {{$Solicitud->created_at}}<br/>
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