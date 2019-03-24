<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NumeroPositivoRule;
use App\Rules\FormatoDireccionRule;

class CiudadRequest extends FormRequest
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
           'urbe_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'comuna_id' => ['nullable',new NumeroPositivoRule,'max:3'],
           'direccion' => ['nullable',new FormatoDireccionRule,'max:255'],
        ];
    }
}
