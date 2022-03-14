<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\User;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\UsuarioFormRequest;
use sisVentasWeb\Http\Requests\UsuarioEditFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Mail;
use sisVentasWeb\Mail\UserAccount;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request)
	{
		if ($request)
		{
            $idempresa = Auth::user()->idempresa;
			$query=trim($request->get('searchText'));
			$usuarios=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->where('idempresa','=',$idempresa)
            ->where('user_type','=',"DRIVER")
            ->orderBy('principal','desc')
			->orderBy('name','asc')
			->paginate(20);
			return view('seguridad.driver.index',["usuarios"=>$usuarios,"searchText"=>$query]);
		}
	}

	public function create()
	{
		return view("seguridad.driver.create");
	}
    
    public function store(UsuarioFormRequest $request)
    {
        //obtenemos fechas de cumpleaños y expiracion
        $birthday = date("Y-m-d", strtotime($request->get('birthday')));
        $expiration_day = date("Y-m-d", strtotime($request->get('expiration_day')));

        //Generamos contraseña
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $generar_contrasena = substr(str_shuffle($permitted_chars), 0, 10);
        
        $usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($generar_contrasena);
    	$usuario->user_type=$request->get('user_type');
    	
    	$usuario->phone=$request->get('phone');
    	$usuario->address=$request->get('address');
    	$usuario->birthday=$birthday;
    	$usuario->driver_license_number=$request->get('driver_license_number');
    	$usuario->expiration_day=$expiration_day;
    	$usuario->issuing_state=$request->get('issuing_state');
    	$usuario->ssn=$request->get('ssn');

        //guardamos imagenes si existen
        if (input::hasfile('license_image')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $file=Input::file('license_image');
            $file->move(public_path().'/images/licenses/',$generar_codigo_imagen.$file->getClientOriginalName());
            $usuario->license_image=$generar_codigo_imagen.$file->getClientOriginalName();
        }

        if (input::hasfile('medical_card_image')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $file=Input::file('medical_card_image');
            $file->move(public_path().'/images/licenses/',$generar_codigo_imagen.$file->getClientOriginalName());
            $usuario->medical_card_image=$generar_codigo_imagen.$file->getClientOriginalName();
        }

        $usuario->empresa=Auth::user()->empresa;
        $usuario->idempresa=Auth::user()->idempresa;
        $usuario->time_zone=Auth::user()->time_zone;
        $usuario->coin=Auth::user()->coin;
        $usuario->logo=Auth::user()->logo;
        $usuario->principal='NO';
        $usuario->state='Enabled';
    	$usuario->save();


        $zonahoraria = Auth::user()->time_zone;
        $moneda = Auth::user()->coin;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Security";
        $bitacora->descripcion="A new user was created, Name: ".$usuario->name.", Email: ".$usuario->email.", Document: ".$usuario->document_type."-".$usuario->document_number.", Address: ".$usuario->address.", Phone: ".$usuario->phone.", Type: ".$usuario->user_type.", Driver License Number: ".$usuario->driver_license_number.", Expiration day: ".$usuario->expiration_day.", SSN: ".$usuario->ssn;
        $bitacora->save();

        //enviamos correo con datos de cuenta
        $contrasena = $generar_contrasena;
        $email=$request->get('email');
        $nombre=$request->get('name');
        Mail::to($email)->send(new UserAccount($nombre,$email,$contrasena));

    	return Redirect::to('seguridad/driver');
    }

    public function edit($id)
    {
    	return view("seguridad.driver.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioEditFormRequest $request,$id)
    {
        $birthday = date("Y-m-d", strtotime($request->get('birthday')));
        $expiration_day = date("Y-m-d", strtotime($request->get('expiration_day')));

        $usuario=User::findOrFail($id);
    	$usuario->name=$request->get('name');
        $usuario->user_type=$request->get('user_type');
    	$usuario->phone=$request->get('phone');
    	$usuario->address=$request->get('address');
    	$usuario->birthday=$birthday;
    	$usuario->driver_license_number=$request->get('driver_license_number');
    	$usuario->expiration_day=$expiration_day;
    	$usuario->issuing_state=$request->get('issuing_state');
    	$usuario->ssn=$request->get('ssn');

        //guardamos imagenes si existen
        if (input::hasfile('license_image')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $file=Input::file('license_image');
            $file->move(public_path().'/images/licenses/',$generar_codigo_imagen.$file->getClientOriginalName());
            $usuario->license_image=$generar_codigo_imagen.$file->getClientOriginalName();
        }

        if (input::hasfile('medical_card_image')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

            $file=Input::file('medical_card_image');
            $file->move(public_path().'/images/licenses/',$generar_codigo_imagen.$file->getClientOriginalName());
            $usuario->medical_card_image=$generar_codigo_imagen.$file->getClientOriginalName();
        }
        $usuario->update();
        
        $zonahoraria = Auth::user()->time_zone;
        $moneda = Auth::user()->coin;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idempresa=Auth::user()->idempresa;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Security ";
        $bitacora->descripcion="A user was edited, Name: ".$usuario->name.", Email: ".$usuario->email.", Document: ".$usuario->document_type."-".$usuario->document_number.", Address: ".$usuario->address.", Phone: ".$usuario->phone.", Type: ".$usuario->user_type.", Driver License Number: ".$usuario->driver_license_number.", Expiration day: ".$usuario->expiration_day.", SSN: ".$usuario->ssn;
        $bitacora->save();

    	return Redirect::to('seguridad/driver');


    }

    public function show($id)
    {
        return view("seguridad.driver.show",["usuario"=>User::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $usu=DB::table('users')->where('id','=',$id)->first();

        $usuario = DB::table('users')
        ->where('id', '=', $id)
        ->delete();

        

            $zonahoraria = Auth::user()->time_zone;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idempresa=Auth::user()->idempresa;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Security";
            $bitacora->descripcion="A user was deleted, Name: ".$usu->name;
            $bitacora->save();

        return Redirect::to('seguridad/driver');
    	
    }
}
