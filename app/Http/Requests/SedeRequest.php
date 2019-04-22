<?php

namespace App\Http\Requests;

use App\Rules\NombreSedeRule;
use App\Rules\SedeUnicaRule;
use Illuminate\Foundation\Http\FormRequest;

class SedeRequest extends FormRequest {
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
			'valor' => ['nullable', new NombreSedeRule, new SedeUnicaRule, 'max:255'],
		];
	}
}
