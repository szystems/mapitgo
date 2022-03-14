<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\WorkReportFormRequest;
use sisVentasWeb\WorkReport;
use sisVentasWeb\Work;
use sisVentasWeb\Liability;
use sisVentasWeb\Location;
use sisVentasWeb\File;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Auth;
use sisVentasWeb\User;

class WorkReportController extends Controller
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
                        ->paginate(100);
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
                        ->paginate(100);
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
                        ->paginate(100);
                    
                    }elseif($iddriver != null and $idvehicle_power_unit == null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('iddriver','LIKE','%'.$iddriver.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(100);
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
                        ->paginate(100);
                    }elseif($iddriver == null and $idvehicle_power_unit != null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('idvehicle_power_unit','LIKE','%'.$idvehicle_power_unit.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(100);
                    }elseif($iddriver == null and $idvehicle_power_unit == null and $idvehicle_trailer != null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('idvehicle_trailer','LIKE','%'.$idvehicle_trailer.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(100);
                    }elseif($iddriver == null and $idvehicle_power_unit == null and $idvehicle_trailer == null)
                    {
                        $works=DB::table('work')
                        ->whereBetween('date', [$desde, $hasta])
                        ->where('idadmin','LIKE','%'.$idadmin.'%')
                        ->where('idclient','LIKE','%'.$idclient.'%')
                        ->where('state_work','LIKE','%'.$state_work.'%')
                        ->orderBy('date','desc')
                        ->paginate(100);
                    }
                    
            } else
            {
                    
                $works=DB::table('work')
                    ->orderBy('date','desc')
                    ->paginate(100);
            }
            return view('reports.works.index',["works"=>$works,"admins"=>$admins,"clients"=>$clients,"drivers"=>$drivers,"vehicles_power_unit"=>$vehicles_porwer_unit,"vehicles_trailer"=>$vehicles_trailer,"desde"=>$desde,"hasta"=>$hasta,"hoy"=>$hoy,"adminfiltro"=>$adminfiltro,"clientfiltro"=>$clientfiltro,"driverfiltro"=>$driverfiltro,"vehiclepowerunitfiltro"=>$vehiclepowerUnitfiltro,"vehicletrailerfiltro"=>$vehicletrailerfiltro,"state_work"=>$state_work]);
        }
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
}
