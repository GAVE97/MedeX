<?php

namespace App\Http\Controllers;

    //modelos
    use App\Solicitud;
    use App\Equipo;
    //end modelos

use Zxing\QrReader;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SolicitudMCCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Solicitudes = Solicitud::all();
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico'])) {
            return view('Formatos.Solicitudes', compact('Solicitudes'));
        }   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico'])) {
            return view('Formatos.newSolicitudMC');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reporta = $request->user()->name;
        //dd($reporta);
        $Solicitud = new Solicitud();
        $Solicitud->ID_inv = $request->input('ID_inv');
        //RELACION CON EL EQUIPO (foreingKey)
        $Equipo = Equipo::where('ID_inventario', $request->ID_inv)->get();
        $Solicitud->Descripcion_del_fallo = $request->input('Descripcion_del_fallo');
    $Solicitud->Observaciones = $request->input('Observaciones');
        $Solicitud->Nombre = $Equipo[0]['Nombre'];
        $Solicitud->Marca = $Equipo[0]['Marca'];
        $Solicitud->Modelo = $Equipo[0]['Modelo'];
        $Solicitud->Area = $Equipo[0]['Area'];
        $Solicitud->Tipo = $Equipo[0]['Tipo'];
        $Solicitud->Num_de_serie = $Equipo[0]['Num_de_serie'];
        $Solicitud->Ubicacion = $Equipo[0]['Ubicacion'];
        $Solicitud->Mnto = $Equipo[0]['Mnto'];
        $Solicitud->reportadoPor = $reporta;
        $Solicitud->save();

        //$Equipo->fill($Equipo->Estatus = 'inactivo');
        //$Equipo->save();                                                                                                                                                                                                                                                                                              
        
        $QRSolicitud = QrCode::size(150)->generate('http://protomedex.site/Solicitud/'.$Solicitud->id);
        $QREquipo = QrCode::size(150)->generate('http://protomedex.site/Equipos/'.$Solicitud->ID_inv);
        $pdf = \PDF::loadView('Formatos.Solicitud', [ "valor1" => $QRSolicitud, "valor2" => $QREquipo], compact('Solicitud'));
        return $pdf->stream('Solicitud Mantenimiento.pdf');

        //no sé si funciona esta wea
        
    }

    public function filtrarSolicitudes(Request $request){
        $valor = $request->valor;

        $Solicitudes = Solicitud::where('Nombre','LIKE',$request->valor)->orWhere('Modelo','LIKE',$request->valor)->orWhere('ID_inv','LIKE',$request->valor)->orWhere('Modelo','LIKE',$request->valor)->orWhere('id','LIKE',$request->valor)->get();

        return view('Formatos.Solicitudes',compact('Solicitudes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $Solicitud = Solicitud::find($id);
        $QRSolicitud = QrCode::size(150)->generate('http://protomedex.site/Solicitud/'.$Solicitud->id);
        $QREquipo = QrCode::size(150)->generate('http://protomedex.site/Equipos/'.$Solicitud->ID_inv);
        $pdf = \PDF::loadView('Formatos.Solicitud', [ "valor1" => $QRSolicitud, "valor2" => $QREquipo], compact('Solicitud'));
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico'])) {
            return $pdf->stream('Solicitud.pdf');
        } 
       
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
}
