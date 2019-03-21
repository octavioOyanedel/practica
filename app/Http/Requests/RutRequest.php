<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RutValidoRule;
use App\Rules\RutUnicoRule;
use App\Rules\FormatoRutRule;

class RutRequest extends FormRequest
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
            'valor' => ['required',new RutValidoRule,'alpha_num',new RutUnicoRule,new FormatoRutRule],
        ];
    }
}
