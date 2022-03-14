<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table='work_files';

    protected $primaryKey='idfile';

    public $timestamps=false;


    protected $fillable =[
        'idwork',
        'datetime',
    	'name',
    	'description',
    	'file'
    ];

    protected $guarded =[

    ];
}
