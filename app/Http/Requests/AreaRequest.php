<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NombreAreaRule;
use App\Rules\AreaUnicaRule;
use App\Rules\NumeroPositivoRule;

class AreaRequest extends FormRequest
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
            'valor' => ['required', new NombreAreaRule, new AreaUnicaRule, 'max:255'],
            'id' => ['required', new NumeroPositivoRule, 'max:3'],
        ];
    }
}
