<?php

namespace sisVentasWeb;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    protected $primaryKey='id';


    protected $fillable = [
        'name',
        'email', 
        'password', 
        'empresa', 
        'time_zone', 
        'coin', 
        'idempresa', 
        'user_type', 
        'principal',
        'phone',
        'address',
        'birthday',
        'driver_license_number',
        'expiration_day',
        'issuing_state',
        'license_image',
        'medical_card_image',
        'ssn',
        
        
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
