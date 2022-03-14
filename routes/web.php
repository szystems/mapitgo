<?php

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

/* Rutas login */
Route::get('/', function () {
    return view('home');
});

//Panel de control Administradores y Empresas
/*Panel de Control */
Route::resource('panel','PanelController');

/* Rutas seguridad */
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('seguridad/configuracion','ConfiguracionController');
Route::resource('seguridad/driver','DriverController');
Route::resource('seguridad/client','ClientController');

/* Rutas Works */
    /*Vehicles*/
    Route::resource('works/vehicle','VehicleController');
    /*Works*/
    Route::resource('works/work','WorkController');
    /*Liabilities*/
    Route::resource('works/liability','LiabilityController');
    /*Files*/
    Route::resource('works/file','FileController');
    /*Locations*/
    Route::resource('works/location','LocationController');

/*Reportes */
Route::resource('reports/bitacora','BitacoraController');
Route::resource('reports/works','WorkReportController');

/*Rutas pdf */
    
    /*Usuarios */
    Route::post('pdf/usuarios','ReportesController@reporteusuarios');
    Route::post('pdf/usuarios/vista','ReportesController@vistausuario');
    Route::post('pdf/drivers','ReportesController@reportedrivers');
    Route::post('pdf/drivers/vista','ReportesController@vistadriver');
    Route::post('pdf/client','ReportesController@reporteclients');
    Route::post('pdf/client/vista','ReportesController@vistaclient');

    /*Vehicles */
    Route::post('pdf/vehicles','ReportesController@reportvehicles');
    Route::post('pdf/vehicles/vista','ReportesController@vehicleview');
    
    /*Bitacora */
    Route::post('pdf/bitacora','ReportesController@reportebitacora');
    Route::post('pdf/bitacora/vista','ReportesController@vistabitacora');
    Route::post('reportes/bitacora/vista','ReportesController@vistabitacorareporte');

    /*Works */
    Route::post('pdf/works','ReportesController@workview');
    Route::post('pdf/works/report','ReportesController@worksreport');

//Vistas 
    /* Inicio */
Route::resource('vistas/vinicio','InicioController');
    /* Rutas Usuario */
Route::resource('vistas/vusuario','VistaUsuarioController');
Route::resource('vistas/vorden','VistaOrderController');
    /* Contacto */
Route::resource('vistas/vcontacto','ContactoController');
    /* Our History */
Route::resource('vistas/ourhistory','OurHistoryController');
    /* WhyShouldCustomersChooseUs */
Route::resource('vistas/whyshouldchooseus','WhyShouldChooseUsController');
    /* What We Do */
Route::resource('vistas/whatwedo','WhatWeDoController');
    /* Rutas Auth */
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
