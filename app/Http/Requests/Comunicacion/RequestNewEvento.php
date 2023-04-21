<?php

namespace App\Http\Requests\Comunicacion;

use Illuminate\Foundation\Http\FormRequest;

class RequestNewEvento extends FormRequest
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

            'title'                  => 'required|min:3|max:255',
            'start_date'             => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'               => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'start_time'             => 'required|date_format:H:i',
            'end_time'               => 'required|date_format:H:i|after_or_equal:start_time',
            'agendaObservacion'      => 'required|min:3|max:255',
            'urlAgendaTeleconf'      => 'required|min:3|max:255',
            'idSalonTeleconferencia' => 'required',
            'idEstadoAgendaTeleconf' => 'required',
            'contacto'               => 'required|min:3|max:50',
            'videoConferencia'       => 'required',
            'cantPer'               => 'required'

        ];


    }


}
