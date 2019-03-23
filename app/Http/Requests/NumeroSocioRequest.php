<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NumeroPositivoRule;
use App\Rules\NumeroSocioRule;
use App\Rules\NumeroSocioUnicoRule;

class NumeroSocioRequest extends FormRequest
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
            'valor' => ['nullable',new NumeroPositivoRule,new NumeroSocioRule, new NumeroSocioUnicoRule],
        ];
    }
}
