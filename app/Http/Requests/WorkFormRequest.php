<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkFormRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idadmin' => 'required',
            'idclient' => 'required',
            'iddriver' => 'required',
            'idvehicle_power_unit'=>'required',
            'idvehicle_trailer'=>'required',
            'days'=>'required',
            'day_rate-hour_rate' => 'required',
            'rateCon_amount' => 'required',
            'pickup_location_longitude'=>['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'pickup_location_latitude'=>['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'delivery_location_longitude'=>['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'delivery_location_latitude'=>['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/']

        ];
    }
}
