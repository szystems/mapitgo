<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;
use sisVentasWeb\Http\Requests;
use sisVentasWeb\Configuracion;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\ConfiguracionFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;

class ConfiguracionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
    	return view("seguridad.configuracion.edit",["configuracion"=>Configuracion::findOrFail($id)]);
    }

    public function update(ConfiguracionFormRequest $request,$id)
    {
    	DB::table('users')
            ->where('idempresa', Auth::user()->idempresa)
            ->update([
            	'empresa' => $request->get('empresa'),
            	'time_zone' => $request->get('time_zone'),
            	'coin' => $request->get('coin'),
            ]);

       
           if ($request->hasFile('logo'))
           {
           		$file = $request->file('logo');
           		$name = time().$file->getClientOriginalName();
	        	$file->move(public_path().'/imagenes/logos', $name);


	        	DB::table('users')
            	->where('idempresa', Auth::user()->idempresa)
            	->update(['logo' => $name]);
            }
            
            $zonahoraria = Auth::user()->time_zone;
            $moneda = Auth::user()->coin;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idempresa=Auth::user()->idempresa;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Settings";
            $bitacora->descripcion="Settings edited, Company: ".$request->get('empresa').", Time Zone: ".$request->get('time_zone').", Coin: ".$request->get('coin');
            $bitacora->save();

    	return Redirect::to('panel');


    }

}
