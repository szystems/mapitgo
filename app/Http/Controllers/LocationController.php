<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\LocationFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use sisVentasWeb\Location;
use sisVentasWeb\Work;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use sisVentasWeb\Mail\WorkLocation;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function store (LocationFormRequest $request)
    {
        //obtenemos datos de formulario
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date_format($hoy,"Y/m/d H:i:s");

        $idwork=$request->get('idwork');
        $title=$request->get('title');
        $description=$request->get('description');
        $longitude=$request->get('longitude');
        $latitude=$request->get('latitude');
        
        $location=new Location;
        $location->datetime=$hoy;
        $location->idwork=$idwork;
        $location->title=$title;
        $location->description=$description;
        $location->longitude=$longitude;
        $location->latitude=$latitude;
        $location->save();

        //enviamos correo con datos de cuenta
        $work=Work::findOrFail($request->get('idwork'));

        $cliente=DB::table('users')
        ->where('id','=',$work->idclient)
        ->first();

        $workid = $work->workid;
        $name = $cliente->name;
        $email=$cliente->email;
        Mail::to($email)->send(new WorkLocation($name,$email,$workid));

        $request->session()->flash('alert-success', 'A new location was correctly added.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function update(LocationFormRequest $request,$id)
    {

        //obtenemos datos de formulario
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date_format($hoy,"Y/m/d H:i:s");

        $idwork=$request->get('idwork');
        $title=$request->get('title');
        $description=$request->get('description');
        $longitude=$request->get('longitude');
        $latitude=$request->get('latitude');
        
        $location=Location::findOrFail($id);
        $location->idwork=$idwork;
        $location->datetime=$hoy;
        $location->title=$title;
        $location->description=$description;
        $location->longitude=$longitude;
        $location->latitude=$latitude;
        $location->save();

        //enviamos correo con datos de cuenta
        $work=Work::findOrFail($request->get('idwork'));

        $cliente=DB::table('users')
        ->where('id','=',$work->idclient)
        ->first();

        $workid = $work->workid;
        $name = $cliente->name;
        $email=$cliente->email;
        Mail::to($email)->send(new WorkLocation($name,$email,$workid));

        $request->session()->flash('alert-success', 'A location was correctly edited.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function destroy($id)
    {
        $location=DB::table('work_locations')
        ->where('idlocation','=',$id)
        ->first();

        $idwork= $location->idwork;

        $deletefile=Location::where('idlocation',$id)->delete();

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }
}
