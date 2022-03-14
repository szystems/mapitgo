<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table='work';

    protected $primaryKey='idwork';

    public $timestamps=false;


    protected $fillable =[
    	'idadmin',
    	'idclient',
    	'iddriver',
        'idvehicle_power_unit',
        'idvehicle_trailer',
        'reefer_unit_number',
        'workid',
        'date',
        'days',
        'day_rate-hour_rate',
        'wages',
        'total_liabilities',
        'rateCon_amount',
        'total_after_reduct',
        'pickup_address',
        'pickup_contact',
        'pickup_phone',
        'pickup_datetime',
        'pickup_location_latitude',
        'pickup_location_longitude',
        'delivery_address',
        'delivery_contact',
        'delivery_phone',
        'delivery_datetime',
        'delivery_location_latitude',
        'delivery_location_longitude',
        'description',
        'status',
        'accept_quote',
        'state'
        
    ];

    protected $guarded =[

    ];
}
