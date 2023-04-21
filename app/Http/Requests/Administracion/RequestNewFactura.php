<?php

namespace App\Http\Requests\Administracion;

use Illuminate\Foundation\Http\FormRequest;

class RequestNewFactura extends FormRequest
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

            'tipo_id' => 'required',
            'numeroFactura' => 'required',
            'fecha' => 'required|date',
            'proveedor_id' => 'required',
            'importeFactura' => 'required',
            'estado_id' => 'required',
            'destinatarioFactura' => 'required',
            'rubros' => 'required'

        ];
    }
}
