<?php

namespace App\Http\Controllers;
    //modelos
    use App\Equipo;
    use App\Mnto;
    use App\Reporte;
    use App\Marca;
    //end modelos

    use Zxing\QrReader;
    use Illuminate\Support\Collection;
    use Illuminate\Http\Request;
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReporteCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin', 'Ingeniero','personalMedico']);
        $Reportes = Reporte::all();
        return view('Formatos.Reportes', compact('Reportes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin', 'Ingeniero','personalMedico']);
        
        $Mntos = Mnto::all();
        return view('Formatos.newReporte', compact('Mntos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Reporte = new Reporte();
        $Reporte->tipo_de_servicio = $request->input('tipo_de_servicio');
        $Reporte->falla_detectada = $request->input('falla_detectada');
        $Reporte->actividades_realizadas = $request->input('actividades_realizadas');
        $Reporte->Materiales = $request->input('Materiales');
        $Reporte->Artículos_de_limpieza = $request->input('Artículos_de_limpieza');
        $Reporte->Equipos_de_medicion = $request->input('Equipos_de_medicion');
        $Reporte->simuladores = $request->input('simuladores');
        $Reporte->Herramienta = $request->input('Herramienta');
        $Reporte->estado_del_servicio = $request->input('estado_del_servicio'); // se tendr'a que hacer un if
        $Reporte->nombre_Mnto = $request->input('nombre_Mnto');//
        $Reporte->ID_inv = $request->input('ID_inv');
        //RELACION CON EL EQUIPO (foreingKey)
        $Equipo = Equipo::where('ID_inventario', $request->ID_inv)->get(); 
        $Reporte->Nombre =  $Equipo[0]['Nombre'];
        $Reporte->Marca =  $Equipo[0]['Marca'];
        $Reporte->Modelo =  $Equipo[0]['Modelo'];
        $Reporte->Area =  $Equipo[0]['Area'];
        $Reporte->Tipo =  $Equipo[0]['Tipo'];
        $Reporte->Num_de_serie =  $Equipo[0]['Num_de_serie'];
        $Reporte->Ubicacion =  $Equipo[0]['Ubicacion'];
        $Reporte->Mnto =  $Equipo[0]['Mnto'];
        $Reporte->servDoneBy = $request->input('servDoneBy');
        $Reporte->Acciones = $request->input('Acciones');
        $Reporte->Observaciones = $request->input('Observaciones');
        $Reporte->origen_del_fallo = $request->input('origen_del_fallo');
        

        if ($Reporte->origen_del_fallo == 'Especifica'){
            $Reporte->origen_del_fallo = $request->input('origen_del_fallo_especifico');
        } 
        else{
            $Reporte->origen_del_fallo = $request->input('origen_del_fallo');
        }
        $Reporte->save();

        $Mnto = Mnto::where('NombreMnto',  $Reporte->Mnto)->get();
        $Reporte->mntoLogo =  $Mnto[0]['imagenMnto'];

        $qrReporte = QrCode::size(150)->generate('http://192.168.100.23:8000/Reportes/'.$Reporte->id);
        $QREquipo = QrCode::size(150)->generate('http://192.168.100.23:8000/Equipos/'.$Reporte->ID_inv);
        $pdf = \PDF::loadView('Formatos.Reporte', ["valor1" => $qrReporte, "valor2" => $QREquipo], compact('Reporte'));
        return $pdf->stream('Reporte de mantenimiento.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $Reporte = Reporte::find($id);
        
        $Mnto = Mnto::where('NombreMnto',  $Reporte->Mnto)->get();
        //dd($Mnto->imagenMnto);
        $Reporte->mntoLogo =  $Mnto[0]['imagenMnto'];
        $qrReporte = QrCode::size(150)->generate('http://192.168.100.23:8000/Reportes/'.$Reporte->id);
        $QREquipo = QrCode::size(150)->generate('http://192.168.100.23:8000/Equipos/'.$Reporte->ID_inv);
        $pdf = \PDF::loadView('Formatos.Reporte', [ "valor1" => $qrReporte, "valor2" => $QREquipo], compact('Reporte'));
        return $pdf->stream('prueba.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }



    public function devQR()
    {

        //////////////////////Esta wea es para leer el QRm
        require  __DIR__ . "../../../../vendor/autoload.php";
        $qrcode = new QrReader('../public/test.png');
        return $text = $qrcode->text();  //return decoded text from QR Code
       // return view('Nav.Ing', compact('Equipos'), compact('Mntos'));
    }
}


