<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\User;
use sisVentasWeb\Persona;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\VistaUsuarioFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;

class VistaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $cliente=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->first();

        return view("vistas.vusuario.show",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);
    }

    public function edit($id)
    {
        $cliente=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->first();

    	return view("vistas.vusuario.edit",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);
    }

    public function update(VistaUsuarioFormRequest $request,$id)
    {
        

        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->phone=$request->get('phone');
        $usuario->address=$request->get('address');
        $usuario->update();     
        
    	$cliente=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->first();

        return view("vistas.vusuario.show",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);


    }
}
