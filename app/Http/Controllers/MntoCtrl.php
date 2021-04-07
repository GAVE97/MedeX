<?php

namespace App\Http\Controllers;
    //modelos
    use App\Equipo;
    use App\Mnto;
    //end modelos

use Illuminate\Http\Request;

class MntoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        $Mntos = Mnto::all();
        return view('Equipo.Mntos', compact('Mntos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        return view('Equipo.newMnto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagenMnto')){
            $file = $request->file('imagenMnto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenesEmpresas/', $name);
        }

        $AddMnto = new Mnto();
        $AddMnto->NombreMnto = $request->input('NombreMnto');
        $AddMnto->Ubicacion = $request->input('Ubicacion');
        $AddMnto->No_tel = $request->input('No_tel');
        $AddMnto->email = $request->input('email');
        $AddMnto->imagenMnto = $name;
        $AddMnto->save();

        return view('Nav.Navegacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $NombreMnto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $NombreMnto)
    {
        $Mnto = Mnto::find($NombreMnto);
        return view('Equipo.showMnto', compact('Mnto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $NombreMnto
     * @return \Illuminate\Http\Response
     */
    public function edit($NombreMnto)
    {
        $request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        $Mnto = Mnto::find($NombreMnto);
        return view('Equipo.editMnto', compact('Mnto'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NombreMnto)
    {
        $Mnto = Mnto::find($NombreMnto);
        $Mnto->fill($request->except('imagenMnto'));
        if($request->hasFile('imagenMnto')){
            $file = $request->file('imagenMnto');
            $name = time().$file->getClientOriginalName();
            $Mnto->imagenMnto = $name;
            $file->move(public_path().'/imagenesEmpresas/', $name);
        }
        $Mnto->Save( );

        return view('Nav.Navegacion');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($NombreMnto)
    {
        $Mnto = Mnto::find($NombreMnto);
        //dd($Mnto);
        $Mnto->delete();
        $Mnto = Mnto::all();
        return view('Nav.Navegacion');
    }
}
