<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('navegacion', 'Nav.Navegacion')->name('navegacion');
///////////////////////////////
//RUTAS PARA LAS SOLICITUDES//
/////////////////////////////
Route::resource('Solicitud', 'SolicitudMCCtrl');
Route::post('/filtro_solicitudes', 'SolicitudMCCtrl@filtrarSolicitudes')->name('filtrarSolicitudes');

/////////////////////////////
//RUTAS PARA LOS REPORTES//
//////////////////////////
Route::resource('Reportes', 'ReporteCtrl');


///////////////////////////
//RUTAS PARA LOS EQUIPOS//
/////////////////////////
Route::resource('Equipos', 'EquiposCtrl');
Route::get('/FrecuenciaMP', 'EquiposCtrl@FrecuenciaMP')->name('FrecuenciaMP');
Route::post('/filtro_inventario', 'EquiposCtrl@filtrarInventario')->name('filtrarInventario');

//////////////////////////
//RUTAS PARA LAS MARCAS//
////////////////////////
Route::resource('Marcas', 'MarcaCtrl');

/////////////////////////////////////////////
//RUTAS PARA LAS EMPRESAS DE MANTENIMIENTO//
///////////////////////////////////////////
Route::resource('Mantenimiento', 'MntoCtrl');

////////////////////////////
//RUTAS PARA LOS MANUALES//
//////////////////////////
Route::resource('manuales', 'ManualsCtrl');

/////////////////////////////
//RUTAS PARA LOS Bitácoras//
///////////////////////////
Route::resource('Bitacoras', 'bitacorasCtrl');

/////////////////////////
//RUTAS PARA LOS ROLES//
///////////////////////
Route::resource('G:19-2000', 'RoleUserCtrl');



Route::get('/pdf', 'PDFCtrl@PDF')->name('descargarPDF');
Route::get('/devQR', 'ReporteCtrl@devQR')->name('devQR');

