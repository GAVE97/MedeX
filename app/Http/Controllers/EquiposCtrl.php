<?php

namespace App\Http\Controllers;
    //modelos
    use App\Equipo;
    use App\Bitacora;
    use App\Mnto;
    use App\Marca;
    //end modelos

use Zxing\QrReader;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EquiposCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])){
           $Equipos = Equipo::all();
        return view('Equipo.Inventario', compact('Equipos')); 
        } else {
            return view('Nav.Login'); 

        }
          
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);

        $Marcas = Marca::all();
        $Mntos = Mnto::all();
         return view('Equipo.AddToInventario', compact('Mntos'), compact('Marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        if($request->hasFile('imagenEquipo')){
            $file = $request->file('imagenEquipo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgInv/', $name);
        }

       
               
                     $AddEquipo = new Equipo();
        $IdEquipo  = $AddEquipo->ID_inventario = $request->input('ID_inventario');
        $NomEquipo = $AddEquipo->Nombre = $request->input('Nombre');
                     $AddEquipo->Area = $request->input('Area');
                     $AddEquipo->Tipo = $request->input('Tipo');
                     $AddEquipo->Marca = $request->input('Marca');
                     $AddEquipo->Modelo = $request->input('Modelo');
        $NumSerie  = $AddEquipo->Num_de_serie = $request->input('Num_de_serie');
                     $AddEquipo->Ubicacion = $request->input('Ubicacion');
                     $AddEquipo->Estatus = $request->input('Estatus');
                     $AddEquipo->vencimientoGarantia = $request->input('vencimientoGarantia');
                     $AddEquipo->Consumo_electrico = $request->input('Consumo_electrico');
                     $AddEquipo->Mnto = $request->input('Mnto');
                     $AddEquipo->porcentUso = $request->input('porcentUso');
                     $AddEquipo->prioridad = $request->input('prioridad');//gregarlo como boton en el frm y como campo en elmigration
                     $AddEquipo->imagenEquipo = $name;
                     $AddEquipo->save();


        $Equipos = Equipo::all();
        return view('Nav.Navegacion');
        

        //////////////////////HACER ESTE TAMAÑO VARIABLE CON UN CONTROL EN LA VISTA addInventario
        //$QRcode = QrCode::size(300)->generate($IdEquipo);
        //$pdfDoc = \PDF::loadView('Formatos.prueba',[ "valor" => $QRcode]);
        //return $pdfDoc->stream($NomEquipo.'-'.$NumSerie.'.pdf');
        //return view('welcome')->with('Agregado con éxito');

        //////////////////////Esta wea es para leer el QRm
        //require  __DIR__ . "../../../../vendor/autoload.php";
        //$qrcode = new QrReader('../public/test.png');
        //return $text = $qrcode->text();  //return decoded text from QR Code
       
    }

    public function filtrarInventario(Request $request)
    {
        $valor = $request->valor;
        $Equipos = Equipo::where('Nombre','LIKE',$request->valor)->orWhere('Modelo','LIKE',$request->valor)->orWhere('ID_inventario','LIKE',$request->valor)->get();
        return view('Equipo.Inventario',compact('Equipos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $ID_inventario)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico']);
        $Equipo = Equipo::find($ID_inventario);   
        return view('Equipo.ShowEquipo', compact('Equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $ID_inventario)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        $Equipo = Equipo::find($ID_inventario);
        return view('Equipo.editEquipo', compact('Equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_inventario)
    {
        $Equipo = Equipo::find($ID_inventario);
        $Equipo->fill($request->except('imagenEquipo'));
        if($request->hasFile('imagenEquipo')){
            $file = $request->file('imagenEquipo');
            $name = time().$file->getClientOriginalName();
            $Equipo->imagenEquipo = $name;
            $file->move(public_path().'/imgInv/', $name);
        }
        $Equipo->save();
        return view('Nav.Navegacion');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID_inventario)
    {
        $Equipo = Equipo::find($ID_inventario);
        //dd($Equipo);
        $Equipo->delete();
        $Equipo = Equipo::all();
        return view('Nav.Navegacion');
    }

    public function FrecuenciaMP(Request $request)
    {
        
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        $Equipo = Equipo::find($request->input('ID_inventario'));
        

        if($Equipo->prioridad == 'II'){

                    $fecha_act = date('Y-m-d'); 
            
                    $fechas[0] = date("d-m-Y",strtotime($fecha_act."+ 4 month")); 
                    $fechas[1]= date("d-m-Y",strtotime($fechas[0]."+ 4 month"));
                    $fechas[2]= date("d-m-Y",strtotime($fechas[1]."+ 4 month"));
                    $fechas[3]= date("d-m-Y",strtotime($fechas[2]."+ 4 month"));
                    $fechas[4]= date("d-m-Y",strtotime($fechas[3]."+ 4 month"));
                    $fechas[5]= date("d-m-Y",strtotime($fechas[4]."+ 4 month"));
        } elseif ($Equipo->prioridad == 'III'){

                $fecha_act = date('Y-m-d'); 
        
                $fechas[0] = date("d-m-Y",strtotime($fecha_act."+ 6 month")); 
                $fechas[1]= date("d-m-Y",strtotime($fechas[0]."+ 6 month"));
                $fechas[2]= date("d-m-Y",strtotime($fechas[1]."+ 6 month"));
                $fechas[3]= date("d-m-Y",strtotime($fechas[2]."+ 6 month"));
        }elseif ($Equipo->prioridad == 'I'){

                $fecha_act = date('Y-m-d'); 

                $fechas[0]= date("d-m-Y",strtotime($fecha_act."+ 2 month")); 
                $fechas[1]= date("d-m-Y",strtotime($fechas[0]."+ 2 month"));
                $fechas[2]= date("d-m-Y",strtotime($fechas[1]."+ 2 month"));
                $fechas[3]= date("d-m-Y",strtotime($fechas[2]."+ 2 month"));
                $fechas[4]= date("d-m-Y",strtotime($fechas[3]."+ 2 month")); 
                $fechas[5]= date("d-m-Y",strtotime($fechas[4]."+ 2 month"));
                $fechas[6]= date("d-m-Y",strtotime($fechas[5]."+ 2 month"));
                $fechas[7]= date("d-m-Y",strtotime($fechas[6]."+ 2 month"));
                $fechas[8]= date("d-m-Y",strtotime($fechas[7]."+ 2 month")); 
                $fechas[9]= date("d-m-Y",strtotime($fechas[8]."+ 2 month"));
                $fechas[10]= date("d-m-Y",strtotime($fechas[9]."+ 2 month"));
                $fechas[11]= date("d-m-Y",strtotime($fechas[10]."+ 2 month"));
        }

        //dd($fechas);
        

        return view('Equipo.Calendario', compact('Equipo'), compact('fechas'));
    }
}
