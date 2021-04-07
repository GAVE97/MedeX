<?php

namespace App\Http\Controllers;

use App\Manual;

use Illuminate\Http\Request;

class ManualsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico']);
        $Manuales = Manual::all();   
        return view('Archivos.Manuales', compact('Manuales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        return view('Archivos.newManual');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name;
        if($request->hasFile('Nombre')){
            $file = $request->file('Nombre');
            $name = time().$file->getClientOriginalName(); 
            $file->move(public_path().'/Manuals/', $name);
        }
        $addManual = new Manual();
        $addManual->Titulo = $request->input('Titulo');
        $addManual->Tipo = $request->input('Tipo');
        $addManual->Modelo_eq = $request->input('Modelo_eq');
        $addManual->Nombre = $name;
        $addManual->save();
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero', 'personalMedico']); 
        $Manual = Manual::find($id);   
        return view('Archivos.showManuales', compact('Manual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']); //aun no está probado
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
