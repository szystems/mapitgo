<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Http\Requests\OrderFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use sisVentasWeb\Work;
use sisVentasWeb\Liability;
use sisVentasWeb\File;
use sisVentasWeb\Location;


use DB;
use Response;
use Auth;
use sisVentasWeb\User;
use Mail;

class VistaOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $idclient = Auth::user()->id;
            $searchCode = $request->get('searchCodigo');

            $works=DB::table('work')
            ->where('workid','LIKE','%'.$searchCode.'%')
            ->where('idclient','=',$idclient)
            ->orderBy('date','desc')
            ->paginate(20);
        
            if($works->count() == 0)
            {
                $request->session()->flash('alert-danger', 'no orders found.');
            }

            return view('vistas.vorden.index',["works"=>$works,"idclient"=>$idclient,"searchCode"=>$searchCode]);
         
        }

    }

    public function create()
    {

        return view("vistas.vorden.create");
    }

    public function store (OrderFormRequest $request)
    {
        $admin=DB::table('users')
            ->where('principal','=',"YES")
            ->first();

        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));

        $days = 0;
        $idclient = $request->get('idclient');
        $salarioxdia = 0;
        $liabilities = 0;
        $total_sueldo = 0;
        $activos_brutos = 0;
        $total_after_reduct = $activos_brutos - $total_sueldo - $liabilities;

        //Generar codigo de reservacion
        $CodigoRepetido = 1;
        while ($CodigoRepetido >= 1):
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo = substr(str_shuffle($permitted_chars), 0, 10);

            $codigoOrdenUnico=DB::table('work')
            ->where('workid','=',$generar_codigo)
            ->get();

            $CodigoRepetido = count($codigoOrdenUnico);
        endwhile;
        
        $work=new Work;
        $work->idadmin=$admin->id;
        $work->idclient=$idclient;
        $work->workid=$generar_codigo;
        $work->date=$hoy;

        $work->days=$days;
        $work->salaryxday=$salarioxdia;
        $work->wages=$total_sueldo;
        $work->total_liabilities=$liabilities;
        $work->total_driver=$total_sueldo;
        $work->assets_gross=$activos_brutos;
        $work->total_after_reduct=$total_after_reduct;

        $work->pickup_address=$request->get('pickup_address');
        $work->pickup_contact=$request->get('pickup_contact');
        $work->pickup_phone=$request->get('pickup_phone');
        $work->pickup_location_latitude=$request->get('pickup_location_latitude');
        $work->pickup_location_longitude=$request->get('pickup_location_longitude');
        $work->delivery_address=$request->get('delivery_address');
        $work->delivery_contact=$request->get('delivery_contact');
        $work->delivery_phone=$request->get('delivery_phone');
        $work->delivery_location_latitude=$request->get('delivery_location_latitude');
        $work->delivery_location_longitude=$request->get('delivery_location_longitude');
        $work->description=$request->get('description');
        $work->state_work="Pending";
        $work->state="Enabled";
        $work->save();

        $request->session()->flash('alert-success', 'Your order was created correctly, a Map It Go agent will be communicating to see the details.');

        return Redirect::to('vistas/vorden');

    }

    public function show($id)
    {
            
        $locations=DB::table('work_locations')
            ->where('idwork','=',$id)
            ->get();

            return view('vistas.vorden.show',["work"=>Work::findOrFail($id),"locations"=>$locations]);
    }

    public function edit($id)
    {
        return view("vistas.vorden.edit",["work"=>Work::findOrFail($id)]);
    }
    public function update(OrderFormRequest $request,$id)
    {
        
        $work=Work::findOrFail($id);
        $work->pickup_address=$request->get('pickup_address');
        $work->pickup_contact=$request->get('pickup_contact');
        $work->pickup_phone=$request->get('pickup_phone');
        $work->pickup_location_latitude=$request->get('pickup_location_latitude');
        $work->pickup_location_longitude=$request->get('pickup_location_longitude');
        $work->delivery_address=$request->get('delivery_address');
        $work->delivery_contact=$request->get('delivery_contact');
        $work->delivery_phone=$request->get('delivery_phone');
        $work->delivery_location_latitude=$request->get('delivery_location_latitude');
        $work->delivery_location_longitude=$request->get('delivery_location_longitude');
        $work->description=$request->get('description');
        $work->update();

        $request->session()->flash('alert-success', 'A order was edited correctly.');

        return app('sisVentasWeb\Http\Controllers\VistaOrderController')->show($work->idwork);
    }

    public function destroy($id)
    {
        $work=Work::findOrFail($id);
        $work->accept_quote='Approved';
        $work->update();

        return Redirect::to('vistas/vorden');
    }
}
