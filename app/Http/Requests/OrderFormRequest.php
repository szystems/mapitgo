<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'pickup_contact' => 'required',
            'pickup_phone' => 'required',
            'pickup_address' => 'required',
            'delivery_contact' => 'required',
            'delivery_phone' => 'required',
            'delivery_address' => 'required'

        ];
    }
}
