<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table='work_locations';

    protected $primaryKey='idlocation';

    public $timestamps=false;


    protected $fillable =[
    	'idwork',
        'datetime',
    	'title',
    	'description',
        'longitude',
        'latitude'
    ];

    protected $guarded =[

    ];
}
