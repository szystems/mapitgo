<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\FileFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use sisVentasWeb\File;
use sisVentasWeb\Work;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function store (FileFormRequest $request)
    {
        //obtenemos datos de formulario
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date_format($hoy,"Y/m/d H:i:s");

        $idwork=$request->get('idwork');
        $name=$request->get('name');
        $description=$request->get('description');
        
        $file=new File;
        $file->datetime=$hoy;
        $file->idwork=$idwork;
        $file->name=$name;
        $file->description=$description;
        if (input::hasfile('file')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $filew=Input::file('file');
            $filew->move(public_path().'/work/files/',$generar_codigo_imagen.$filew->getClientOriginalName());
            $file->file=$generar_codigo_imagen.$filew->getClientOriginalName();
        }
        $file->save();

        $request->session()->flash('alert-success', 'A new file was correctly added.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function update(Request $request,$id)
    {

        //obtenemos datos de formulario
        //obtenemos datos de formulario
        $zona_horaria = Auth::user()->time_zone;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date_format($hoy,"Y/m/d H:i:s");

        $idwork=$request->get('idwork');
        $name=$request->get('name');
        $description=$request->get('description');
        
        $file=File::findOrFail($id);
        $file->datetime=$hoy;
        $file->name=$name;
        $file->description=$description;
        //guardamos file si existen
        if (input::hasfile('file')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $filew=Input::file('file');
            $filew->move(public_path().'/work/files/',$generar_codigo_imagen.$filew->getClientOriginalName());
            $file->file=$generar_codigo_imagen.$filew->getClientOriginalName();
        }
        $file->save();

        $request->session()->flash('alert-success', 'A file was correctly edited.');

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }

    public function destroy($id)
    {
        $file=DB::table('work_files')
        ->where('idfile','=',$id)
        ->first();

        $idwork= $file->idwork;

        $deletefile=File::where('idfile',$id)->delete();

        return app('sisVentasWeb\Http\Controllers\WorkController')->show($idwork);
    }
}
