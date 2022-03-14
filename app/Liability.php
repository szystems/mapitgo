<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    protected $table='work_liabilities';

    protected $primaryKey='idliability';

    public $timestamps=false;


    protected $fillable =[
        'datetime',
    	'idwork',
    	'type',
    	'name',
        'description',
        'total'
    ];

    protected $guarded =[

    ];
}
