<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordUsuarioRule;
use App\Rules\PasswordsIgualesRule;

class ContrasenaRequest extends FormRequest
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
        'nueva' => ['required',new PasswordUsuarioRule, new PasswordsIgualesRule(Request()->confirmar),'max:10'],
        'confirmar' => ['required',new PasswordUsuarioRule, new PasswordsIgualesRule(Request()->nueva),'max:10'],
        ];
    }
}
