<?php

namespace App\Http\Controllers;

//modelos
use App\Bitacora;
use App\Equipo;
//

use Illuminate\Http\Request;

class bitacorasCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico']);
        $Bitacoras = Bitacora::all();   
        return view('Archivos.Bitacoras', compact('Bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin','Ingeniero']);
        return view('Archivos.newBitacora');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addBitacora = new Bitacora();
        if($request->hasFile('imagenBitacora')){
            $file = $request->file('imagenEquipo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenesBitacora/', $name);
        }else{
            $name = 'no_asignado';
        }
        $addBitacora->Tipo = $request->input('Tipo');
        $addBitacora->Equipo = $request->input('Equipo');
        $addBitacora->bitacora = $request->input('bitacora');
        $addBitacora->fileName = $name;
        $addBitacora->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $Bitacora = Bitacora::find($id);
        return view('Archivos.showBitacora', compact('Bitacora'));
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
