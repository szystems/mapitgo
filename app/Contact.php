<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public $timestamps=false;


    protected $fillable =[
    	'name',
    	'phone',
    	'email',
        'subject',
        'message'
        
    ];

    protected $guarded =[

    ];
}
