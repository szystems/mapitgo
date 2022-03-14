<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Work;
use sisVentasWeb\Location;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\WorkFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Mail;
use sisVentasWeb\Mail\WorkCreate;
use sisVentasWeb\Mail\WorkEdit;
use sisVentasWeb\Mail\WorkCancel;
use sisVentasWeb\Mail\WorkFinalized;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {

            $idempresa = Auth::user()->idempresa;
            $desde=trim($request->get('desde'));
            $hasta=trim($request->get('hasta'));

            $searchCodigo = $request->get('searchCodigo');

            $desde = date("Y-m-d", strtotime($desde));
            $hasta = date("Y-m-d", strtotime($hasta));

            $idadmin=$request->get('idadmin');
            $idclient=$request->get('idclient');
            $iddriver=$request->get('iddriver');
            $idvehicle_power_unit=$request->get('idvehicle_power_unit');
            $idvehicle_trailer=$request->get('idvehicle_trailer');
            $state_work=$request->get('state');

            
            $admins=DB::table('users')
            ->where('user_type','=','ADMIN')
            ->where('state','=','Enabled')
            ->get();

            $clients=DB::table('users')
            ->where('user_type','=','CLIENT')
            ->where('state','=','Enabled')
            ->get();

            $drivers=DB::table('users')
            ->where('user_type','=','DRIVER')
            ->where('state','=','Enabled')
            ->get();

            $vehicles_porwer_unit=DB::table('vehicle')
            ->where('type','=','Power Unit')
            ->where('state','=','Enabled')
            ->get();

            $vehicles_trailer=DB::table('vehicle')
            ->where('type','=','Trailer')
            ->where('state','=','Enabled')
            ->get();

            $adminfiltro=DB::table('users')
			->select('name','id')
            ->where('id','=',$idadmin)
            ->where('idempresa','=',$idempresa)
            ->get();
                    
            $clientfiltro=DB::table('users')
            ->select('name','id')
            ->where('id','=',$idclient)
            ->where('idempresa','=',$idempresa)
            ->get();

            $driverfiltro=DB::table('users')
            ->select('name','id')
            ->where('id','=',$iddriver)
            ->where('idempresa','=',$idempresa)
            ->get();

            $vehiclepowerUnitfiltro=DB::table('vehicle')
            ->where('idvehicle','=',$idvehicle_power_unit)
            ->get();

            $vehicletrailerfiltro=DB::table('vehicle')
            ->where('idvehicle','=',$idvehicle_trailer)
            ->get();

            $zona_horaria = Auth::user()->time_zone;
            $hoy = Carbon::now($zona_horaria);
            $hoy = $hoy->format('d-m-Y');

            $xsearch = trim($request->get('xsearch'));
            if ($xsearch == "")
            {
                $xsearch = "xfil";
            }

            

            if ($xsearch == "xfil")
            {   
                if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    $desde = date("Y-m-d", strtotime($desde));
                    $hasta = date("Y-m-d", strtotime($hasta));
                    if($iddriver != null and $idvehicle_power_unit != null and $idvehicle_trailer != null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('iddriver','LIKE','%'.$iddriver.'%')
                        ->where('idvehicle_power_unit','LIKE','%'.$idvehicle_power_unit.'%')
                        ->where('idvehicle_trailer','LIKE','%'.$idvehicle_trailer.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver != null and $idvehicle_power_unit != null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('iddriver','LIKE','%'.$iddriver.'%')
                        ->where('idvehicle_power_unit','LIKE','%'.$idvehicle_power_unit.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver != null and $idvehicle_power_unit == null and $idvehicle_trailer != null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('iddriver','LIKE','%'.$iddriver.'%')
                        ->where('idvehicle_trailer','LIKE','%'.$idvehicle_trailer.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    
                    }elseif($iddriver != null and $idvehicle_power_unit == null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('iddriver','LIKE','%'.$iddriver.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver == null and $idvehicle_power_unit != null and $idvehicle_trailer != null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('idvehicle_power_unit','LIKE','%'.$idvehicle_power_unit.'%')
                        ->where('idvehicle_trailer','LIKE','%'.$idvehicle_trailer.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver == null and $idvehicle_power_unit != null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('idvehicle_power_unit','LIKE','%'.$idvehicle_power_unit.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver == null and $idvehicle_power_unit == null and $idvehicle_trailer != null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('idvehicle_trailer','LIKE','%'.$idvehicle_trailer.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }elseif($iddriver == null and $idvehicle_power_unit == null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(20);
                    }
                    
                }
                else
                {
                    
                    $works=DB::table('work')
                    ->orderBy('date','desc')
                    ->paginate(20);
                }
            }
            elseif($xsearch == "xcod")
            {
                $works=DB::table('work')
                    ->where('workid','LIKE','%'.$searchCodigo.'%')
                    ->orderBy('date','desc')
                    ->paginate(20);
            }
            return view('works.work.index',["works"=>$works,"admins"=>$admins,"clients"=>$clients,"drivers"=>$drivers,"vehicles_power_unit"=>$vehicles_porwer_unit,"vehicles_trailer"=>$vehicles_trailer,"desde"=>$desde,"hasta"=>$hasta,"hoy"=>$hoy,"adminfiltro"=>$adminfiltro,"clientfiltro"=>$clientfiltro,"driverfiltro"=>$driverfiltro,"vehiclepowerunitfiltro"=>$vehiclepowerUnitfiltro,"vehicletrailerfiltro"=>$vehicletrailerfiltro,"state_work"=>$state_work]);
        }
    }
    public function create()
    {
        $clients=DB::table('users')
        ->where('user_type','=','CLIENT')
        ->where('state','=','Enabled')
        ->get();

        $drivers=DB::table('users')
        ->where('user_type','=','DRIVER')
        ->where('state','=','Enabled')
        ->get();

        $vehicles_porwer_unit=DB::table('vehicle')
        ->where('type','=','Power Unit')
        ->where('state','=','Enabled')
        ->get();

        $vehicles_trailer=DB::table('vehicle')
        ->where('type','=','Trailer')
        ->where('state','=','Enabled')
        ->get();

        return view("works.work.create",["clients"=>$clients,"drivers"=>$drivers,"vehicles_power_unit"=>$vehicles_porwer_unit,"vehicles_trailer"=>$vehicles_trailer]);
    }
    public function store (WorkFormRequest $request)
    {
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));

        $days = $request->get('days');
        $salarioxdia = $request->get('day_rate-hour_rate');
        $liabilities = 0;
        $total_sueldo = $days * $salarioxdia;
        $activos_brutos = $request->get('rateCon_amount');
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
        $work->idadmin=$request->get('idadmin');
        $work->idclient=$request->get('idclient');
        $work->iddriver=$request->get('iddriver');
        $work->idvehicle_power_unit=$request->get('idvehicle_power_unit');
        $work->idvehicle_trailer=$request->get('idvehicle_trailer');
        $work->reefer_unit_number=$request->get('reefer_unit_number');
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
        $work->state_work="Active";
        $work->accept_quote=$request->get('accept_quote');
        $work->state="Enabled";
        $work->save();

        $zonahoraria = Auth::user()->time_zone;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A new work was created, ID Work: ".$work->workid;
        $bitacora->save();

        $request->session()->flash('alert-success', 'A work was created correctly.');

        //enviamos correo con datos de cuenta
        $cliente=DB::table('users')
        ->where('id','=',$request->get('idclient'))
        ->first();

        $workid = $generar_codigo;
        $name = $cliente->name;
        $email=$cliente->email;
        Mail::to($email)->send(new WorkCreate($name,$email,$workid));

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($work->idwork);

    }

    public function show($id)
    {
        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$id)
        ->get();
        $files=DB::table('work_files')
        ->where('idwork','=',$id)
        ->get();
        $locations=DB::table('work_locations')
        ->where('idwork','=',$id)
        ->get();

        

        return view("works.work.show",["work"=>Work::findOrFail($id),"liabilities"=>$liabilities,"files"=>$files,"locations"=>$locations]);
    }
    public function edit($id)
    {
        $clients=DB::table('users')
        ->where('user_type','=','CLIENT')
        ->where('state','=','Enabled')
        ->get();

        $drivers=DB::table('users')
        ->where('user_type','=','DRIVER')
        ->where('state','=','Enabled')
        ->get();

        $vehicles_porwer_unit=DB::table('vehicle')
        ->where('type','=','Power Unit')
        ->where('state','=','Enabled')
        ->get();

        $vehicles_trailer=DB::table('vehicle')
        ->where('type','=','Trailer')
        ->where('state','=','Enabled')
        ->get();

        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$id)
        ->get();
        $files=DB::table('work_files')
        ->where('idwork','=',$id)
        ->get();
        $locations=DB::table('work_locations')
        ->where('idwork','=',$id)
        ->get();

        return view("works.work.edit",["work"=>Work::findOrFail($id),"clients"=>$clients,"drivers"=>$drivers,"vehicles_power_unit"=>$vehicles_porwer_unit,"vehicles_trailer"=>$vehicles_trailer,"liabilities"=>$liabilities,"files"=>$files,"locations"=>$locations]);
    }
    public function update(Request $request,$id)
    {

        $days = $request->get('days');
        $salarioxdia = $request->get('day_rate-hour_rate');
        //obtener total de liabilities
        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$id)
        ->get();
        $total_liabilities = 0;
        foreach($liabilities as $liability)
        {
            $total_liabilities = $total_liabilities + $liability->total;
        }
        $total_sueldo = $days * $salarioxdia;
        $activos_brutos = $request->get('rateCon_amount');
        $total_after_reduct = $activos_brutos - $total_sueldo - $total_liabilities;
        
        $work=Work::findOrFail($id);
        $work->state_work=$request->get('status');
        $work->accept_quote=$request->get('accept_quote');
        $work->idadmin=$request->get('idadmin');
        $work->idclient=$request->get('idclient');
        $work->iddriver=$request->get('iddriver');
        $work->idvehicle_power_unit=$request->get('idvehicle_power_unit');
        $work->idvehicle_trailer=$request->get('idvehicle_trailer');
        $work->reefer_unit_number=$request->get('reefer_unit_number');

        $work->days=$days;
        $work->salaryxday=$salarioxdia;
        $work->wages=$total_sueldo;
        $work->total_liabilities=$total_liabilities;
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
        $work->update();

        $zonahoraria = Auth::user()->time_zone;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A new work was edited, ID Work: ".$work->workid;
        $bitacora->save();

        $request->session()->flash('alert-success', 'A work was edited correctly.');

        //enviamos correo con datos de cuenta
        $cliente=DB::table('users')
        ->where('id','=',$request->get('idclient'))
        ->first();

        if($work->state_work == "Finalized")
        {
            $workid = $work->workid;
            $name = $cliente->name;
            $email=$cliente->email;
            Mail::to($email)->send(new WorkFinalized($name,$email,$workid));
        }else
        {
            $workid = $work->workid;
            $name = $cliente->name;
            $email=$cliente->email;
            Mail::to($email)->send(new WorkEdit($name,$email,$workid));
        }

        

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($work->idwork);
    }
    public function destroy($id)
    {
        $work=Work::findOrFail($id);
        $work->state_work='Canceled';
        $work->state='Deleted';
        $work->update();

        $zonahoraria = Auth::user()->time_zone;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Works";
        $bitacora->descripcion="A work was canceled, ID Work: ".$work->workid;
        $bitacora->save();

        //enviamos correo con datos de cuenta
        $cliente=DB::table('users')
        ->where('id','=',$work->idclient)
        ->first();

        $workid = $work->workid;
        $name = $cliente->name;
        $email=$cliente->email;
        Mail::to($email)->send(new WorkCancel($name,$email,$workid));

        return Redirect::to('works/vehicle');
    }
}
