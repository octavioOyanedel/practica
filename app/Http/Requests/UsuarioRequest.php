<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NombrePropioRule;
use App\Rules\CorreoUnicoUsuarioRule;
use App\Rules\PasswordUsuarioRule;

class UsuarioRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
           'nombre_usuario' => ['required',new NombrePropioRule,'max:255'],
           'correo' => ['required','email',new CorreoUnicoUsuarioRule,'max:255'],
           'contrasena' => ['required',new PasswordUsuarioRule,'max:8'],
           'contrasena2' => ['required',new PasswordUsuarioRule,'max:8'],
		];
	}
}
