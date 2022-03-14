<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table='vehicle';

    protected $primaryKey='idvehicle';

    public $timestamps=false;


    protected $fillable =[
    	'number_vehicle',
    	'other_id',
    	'make',
        'model',
        'year',
        'capacity',
        'type',
        'trailer_or_unit_type',
        'no_plate',
        'oregon_weight',
        'state_vehicle',
        'state'
        
    ];

    protected $guarded =[

    ];
}
