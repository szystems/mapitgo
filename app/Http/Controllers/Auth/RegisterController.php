<?php

namespace sisVentasWeb\Http\Controllers\Auth;

use sisVentasWeb\User;
use sisVentasWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Carbon\Carbon;

use sisVentasWeb\Mail\CuentaUsuarioRegistro;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:45',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \sisVentasWeb\User
     */
    protected function create(array $data)
    {
        $datosConfig=DB::table('users')
            ->where('principal','=','YES')
            ->first();

        $hoy = Carbon::now($datosConfig->time_zone);
        $hoy = $hoy->format('Y-m-d');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['telefono'],
            'address' => $data['address'],
            'birthday' => $hoy,
            'password' => bcrypt($data['password']),
            'empresa' => $datosConfig->empresa,
            'idempresa' => $datosConfig->idempresa,
            'user_type' => 'CLIENT',
            'time_zone' => $datosConfig->time_zone,
            'coin' => $datosConfig->coin,
            'logo' =>  $datosConfig->logo,
            'principal' => 'NO',

        ]);
    }
}