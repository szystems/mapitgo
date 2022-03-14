<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\LiabilityFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use sisVentasWeb\Liability;
use sisVentasWeb\Work;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Storage;

class LiabilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function store (LiabilityFormRequest $request)
    {
        //obtenemos datos de formulario
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date_format($hoy,"Y/m/d H:i:s");

        $idwork=$request->get('idwork');
        $type=$request->get('type');
        $name=$request->get('name');
        $description=$request->get('description');
        $total=$request->get('total');
        
        $liability=new Liability;
        $liability->datetime=$hoy;
        $liability->idwork=$idwork;
        $liability->type=$type;
        $liability->name=$name;
        $liability->description=$description;
        $liability->total=$total;
        $liability->save();

        //Total Liabilities
        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$idwork)
        ->get();
        $total_liabilities = 0;
        foreach($liabilities as $liability)
        {
            $total_liabilities = $total_liabilities + $liability->total;
        }
        //buscamos Work
        $work=DB::table('work')
        ->where('idwork','=',$idwork)
        ->first();
        //calculamos totales de Work
        $total_after_reduct = $work->assets_gross - $work->total_driver - $total_liabilities;
        
        $work=Work::findOrFail($idwork);
        $work->total_liabilities=$total_liabilities;
        $work->total_after_reduct=$total_after_reduct;
        $work->update();

        $request->session()->flash('alert-success', 'A new liability was correctly added.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function update(Request $request,$id)
    {

        //obtenemos datos de formulario
        
        $idwork=$request->get('idwork');
        $type=$request->get('type');
        $name=$request->get('name');
        $description=$request->get('description');
        $total=$request->get('total');
        
        $liability=Liability::findOrFail($id);
        $liability->type=$type;
        $liability->name=$name;
        $liability->description=$description;
        $liability->total=$total;
        $liability->save();

        //Total Liabilities
        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$idwork)
        ->get();
        $total_liabilities = 0;
        foreach($liabilities as $liability)
        {
            $total_liabilities = $total_liabilities + $liability->total;
        }
        //buscamos Work
        $work=DB::table('work')
        ->where('idwork','=',$idwork)
        ->first();
        //calculamos totales de Work
        $total_after_reduct = $work->assets_gross - $work->total_driver - $total_liabilities;
        
        $work=Work::findOrFail($idwork);
        $work->total_liabilities=$total_liabilities;
        $work->total_after_reduct=$total_after_reduct;
        $work->update();

        $request->session()->flash('alert-success', 'A liability was correctly edited.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function destroy($id)
    {
        $liability=DB::table('work_liabilities')
        ->where('idliability','=',$id)
        ->first();

        $idwork= $liability->idwork;

        $deleteliability=Liability::where('idliability',$id)->delete();

        //Total Liabilities
        $liabilities=DB::table('work_liabilities')
        ->where('idwork','=',$idwork)
        ->get();
        $total_liabilities = 0;
        foreach($liabilities as $liability)
        {
            $total_liabilities = $total_liabilities + $liability->total;
        }
        //buscamos Work
        $work=DB::table('work')
        ->where('idwork','=',$idwork)
        ->first();
        //calculamos totales de Work
        $total_after_reduct = $work->assets_gross - $work->total_driver - $total_liabilities;
        
        $work=Work::findOrFail($idwork);
        $work->total_liabilities=$total_liabilities;
        $work->total_after_reduct=$total_after_reduct;
        $work->update();

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }
}
