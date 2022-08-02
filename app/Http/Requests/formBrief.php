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
            'VigIni'=>['required', 'date'],
            'VigFin'=>['required', 'date'],
            'VigPag'=>['required', 'date'],
            'VigLiq'=>['required', 'date'],
            'ObjGen'=>['max:1600'],
            'ObjEsp'=>['max:1600'],
            'Cond'=>['max:200'],
            'ForPagVe'=>['required'],
            'ForPagLab'=>['required'],
            'Pres'=>['required'],
            'State'=>['int'],
        ];
    }
    
    public function attributes()
    {
        return [
            'Solicitante'=> ' Solicitante ',
            'VigIni'=> ' Fecha Inicio ',
            'VigFin'=> ' Fecha final ',
            'VigPag'=> ' Fecha de pago ',
            'VigLiq'=> ' Fecha de liquidación ',
            'Pres'=> ' Presupuesto ',
            'ObjGen'=> ' Objetivo general ',
            'ObjEsp'=> ' Objetivos especificos ',
            'Cond'=> ' Condiciones ',
            'ForPagVe'=> ' Forma de pago al vendedor ',
            'ForPagLab'=> ' Forma de pago del lavoratorio ',
            'Pres'=> ' Presupuesto ',
            'State'=> ' Estado ',
        ];
    }
}
