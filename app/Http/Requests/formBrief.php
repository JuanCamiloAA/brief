<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formBrief extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Solicitante'=>['required'],
            'VigIni'=>['required'],
            'VigFin'=>['required'],
            'VigPag'=>['required'],
            'Pres'=>['required'],
        ];
    }
    
    public function attributes()
    {
        return [
            'Solicitante'=>'Solicitante',
            'VigIni'=>'Fecha Inicio',
            'VigFin'=>'Fecha final',
            'VigPag'=>'Fecha de pago',
            'Pres'=>'Presupuesto'
        ];
    }
}
