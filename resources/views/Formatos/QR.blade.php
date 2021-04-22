@extends('layouts.Doc')

@section('title', 'Solicitud')

@section('content')

<table  width=100%>  <!-- Tabla vacia de separación -->
    <tr>
        <td><br/>
        </td>
    </tr>
</table>

<table  width=100%>  <!-- Códigos QR y firma -->
    <tr>
        <td width=20%>       
            
        </td>
        <td>
            <div class="col">
                <img class="mx-1 my-1" src="data:image/svg+xml;base64, {{base64_encode($valor)}}"><br>
                <FONT SIZE=+1.2>ID: {{$id}}<br>Equipo: {{$NomEquipo}}<br>No. de serie: {{$NumSerie}}</FONT>
            </div>
        </td>
        <br>
        <td>
            <div class="col">
                <img class="mx-1 my-1" src="data:image/svg+xml;base64, {{base64_encode($valor)}}"><br>
                <FONT SIZE=+1.2>ID: {{$id}}<br>Equipo: {{$NomEquipo}}<br>No. de serie: {{$NumSerie}}</FONT>
            </div>
        </td>
        <td width=25%>
        </td>
    </tr>
</table>
</table>
@endsection