<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileFormRequest extends FormRequest
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
            'idwork'=>'required',
            'name'=>'required',
            'description'=>'max:500',
            'file'=>'required|max:50000'
        ];
    }
}
