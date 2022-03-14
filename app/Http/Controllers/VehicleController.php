<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Vehicle;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\VehicleFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Input;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $vehicles=DB::table('vehicle')
            ->where('idvehicle','=',$query)
            ->where ('state','!=','Deleted')
            ->orwhere('other_id','LIKE','%'.$query.'%')
            ->where ('state','!=','Deleted')
            ->orderBy('number_vehicle','desc')
            ->paginate(20);

            $vehiclesSearch=DB::table('vehicle')
            ->where ('state','!=','Deleted')
            ->orderBy('number_vehicle','desc')
            ->get();

            return view('works.vehicle.index',["vehicles"=>$vehicles,"vehiclesSearch"=>$vehiclesSearch,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("works.vehicle.create");
    }
    public function store (VehicleFormRequest $request)
    {
        if($request->get('state_vehicle') == 'Enabled')
            {
                $state_vehicle = 'Enabled';
            }else
            {
                $state_vehicle = 'Disabled';
            }

        $vehicle=new Vehicle;
        $vehicle->number_vehicle=$request->get('number_vehicle');
        $vehicle->other_id=$request->get('other_id');
        $vehicle->make=$request->get('make');
        $vehicle->model=$request->get('model');
        $vehicle->year=$request->get('year');
        $vehicle->capacity=$request->get('capacity');
        $vehicle->type=$request->get('type');
        $vehicle->trailer_or_unit_type=$request->get('trailer_or_unit_type');
        $vehicle->no_plate=$request->get('no_plate');
        $vehicle->oregon_weight=$request->get('additional_licencing');
        $vehicle->state_vehicle=$state_vehicle;
        $vehicle->state="Enabled";
        $vehicle->save();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A new vehicle was created, Number Vehicle: ".$vehicle->number_vehicle.", Other ID: ".$vehicle->other_id.", Make: ".$vehicle->make.", Model: ".$vehicle->model.", Year: ".$vehicle->Year.", Capacity: ".$vehicle->capacity.", Type: ".$vehicle->type.", Trailer or Unit Type: ".$vehicle->trailer_or_unit_type.", No. Plate: ".$vehicle->no_plate.", Additional Licencing: ".$vehicle->oregon_weight.", State: ".$vehicle->state_vehicle;
        $bitacora->save();

        $request->session()->flash('alert-success', 'A vehicle was created correctly.');

        return view("works.vehicle.show",["vehicle"=>vehicle::findOrFail($vehicle->idvehicle)]);

    }
    public function show($id)
    {
        return view("works.vehicle.show",["vehicle"=>Vehicle::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("works.vehicle.edit",["vehicle"=>Vehicle::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        if($request->get('state_vehicle') == 'Enabled')
            {
                $state_vehicle = 'Enabled';
            }else
            {
                $state_vehicle = 'Disabled';
            }

        $vehicle=Vehicle::findOrFail($id);
        $vehicle->number_vehicle=$request->get('number_vehicle');
        $vehicle->other_id=$request->get('other_id');
        $vehicle->make=$request->get('make');
        $vehicle->model=$request->get('model');
        $vehicle->year=$request->get('year');
        $vehicle->capacity=$request->get('capacity');
        $vehicle->type=$request->get('type');
        $vehicle->trailer_or_unit_type=$request->get('trailer_or_unit_type');
        $vehicle->no_plate=$request->get('no_plate');
        $vehicle->oregon_weight=$request->get('additional_licencing');
        $vehicle->state_vehicle=$state_vehicle;
        $vehicle->update();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A vehicle was edited, Number Vehicle: ".$vehicle->number_vehicle.", Other ID: ".$vehicle->other_id.", Make: ".$vehicle->make.", Model: ".$vehicle->model.", Year: ".$vehicle->Year.", Capacity: ".$vehicle->capacity.", Type: ".$vehicle->type.", Trailer or Unit Type: ".$vehicle->trailer_or_unit_type.", No. Plate: ".$vehicle->no_plate.", Additional Licencing: ".$vehicle->oregon_weight.", State: ".$vehicle->state_vehicle;
        $bitacora->save();

        $request->session()->flash('alert-success', 'The vehicle was edited correctly.');

        return view("works.vehicle.show",["vehicle"=>$vehicle]);
    }
    public function destroy($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        $vehicle->state_vehicle='Inactive';
        $vehicle->state='Deleted';
        $vehicle->update();

        $vehi=DB::table('vehicle')->where('idvehicle','=',$id)->first();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A vehicle was removed, Number vehicle: ".$vehi->number_vehicle;
        $bitacora->save();

        return Redirect::to('works/vehicle');
    }
}
