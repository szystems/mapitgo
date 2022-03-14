<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class WorkReport extends Model
{
    protected $table='work';

    protected $primaryKey='idwork';

    public $timestamps=false;


    protected $fillable =[
        
    ];

    protected $guarded =[

    ];
}
