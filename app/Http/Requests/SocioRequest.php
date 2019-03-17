<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NombrePropioRule;
use App\Rules\NumeroPositivoRule;
use App\Rules\RutValidoRule;
use App\Rules\RutUnicoRule;
use App\Rules\FormatoRutRule;
use App\Rules\CelularRule;
use App\Rules\TelefonoFijoRule;
use App\Rules\CorreoUnicoRule;
use App\Rules\FormatoDireccionRule;
use App\Rules\AnexoRule;
use App\Rules\NumeroSocioRule;

class SocioRequest extends FormRequest
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
           'nombres' => ['required',new NombrePropioRule,'max:255'],
           'apellidos' => ['required',new NombrePropioRule,'max:255'],
           'rut' => ['required',new RutValidoRule,'alpha_num',new RutUnicoRule,new FormatoRutRule],
           'fecha_nacimiento' => 'nullable|date',
           'celular' => ['nullable',new NumeroPositivoRule,new CelularRule],
           'fijo' => ['nullable',new NumeroPositivoRule,new TelefonoFijoRule],
           'correo' => ['nullable','email',new CorreoUnicoRule],
           'direccion' => ['nullable',new FormatoDireccionRule,'max:255'],
           'fecha_pucv' => 'nullable|date',
           'anexo' => ['nullable',new NumeroPositivoRule,new AnexoRule],
           'numero_socio' => ['nullable',new NumeroPositivoRule,new NumeroSocioRule],
           'fecha_sind1' => 'nullable|date',
           'sede_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'area_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'cargo_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'urbe_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'comuna_id' => ['nullable',new NumeroPositivoRule,'max:3'],
        ];
    }
}
