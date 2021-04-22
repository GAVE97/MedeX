<?php

namespace App\Http\Controllers;
    //modelos
    use App\Equipo;
    use App\Marca;
    //end modelos

use Illuminate\Http\Request;

class MarcaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Marcas = Marca::all();
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])) {
            return view('Equipo.Marcas', compact('Marcas'));
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
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])) {
            return view('Equipo.newMarca');
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
        if($request->hasFile('imagenMarca')){
            $file = $request->file('imagenMarca');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenesEmpresas/', $name);
        }

        $AddMarca = new Marca();
        $AddMarca->NombreMrk = $request->input('NombreMrk');
        $AddMarca->Ubicacion = $request->input('Ubicacion');
        $AddMarca->No_tel = $request->input('No_tel');
        $AddMarca->email = $request->input('email');
        $AddMarca->imagenMarca = $name;
        $AddMarca->save();

        return view('Nav.Navegacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $NombreMrk)
    {
        $Marca = Marca::find($NombreMrk);
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])) {
            return view('Equipo.showMarca', compact('Marca'));
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $NombreMrk)
    {
        $Marca = Marca::find($NombreMrk);
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])) {
            return view('Equipo.editMarca', compact('Marca'));
        } 
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NombreMrk)
    {
        $Marca = Marca::find($NombreMrk);
        $Marca->fill($request->except('imagenMarca'));
        if($request->hasFile('imagenMarca')){
            $file = $request->file('imagenMarca');
            $name = time().$file->getClientOriginalName();
            $Marca->imagenMarca=$name;
            $file->move(public_path().'/imagenesEmpresas/', $name);
        }
        $Marca->save();
       
        return view('Nav.Navegacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Request $request, $NombreMrk)
    {
        $Marca = Marca::find($NombreMrk);
        if(! $request->user()){
            //Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole(['superAdmin', 'Ingeniero'])) {
            $Marca->delete();
            return view('Nav.Navegacion');
        } 

    }
}
