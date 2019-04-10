<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NumeroPositivoRule;
use App\Rules\NumeroChequeUnicoRule;
use App\Rules\NumeroPrestamoUnicoRule;

class PrestamoRequest extends FormRequest
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
            'numero_prestamo' => ['required',new NumeroPositivoRule, new NumeroPrestamoUnicoRule,'max:8'],
            'cheque' => ['required',new NumeroPositivoRule, new NumeroChequeUnicoRule,'max:8'],
            'monto' => ['required',new NumeroPositivoRule,'max:7'],
        ];
    }
}
