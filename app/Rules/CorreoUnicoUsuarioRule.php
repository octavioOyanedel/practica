<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class CorreoUnicoUsuarioRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $correo = User::where('email','=',$value);
        if($correo->count() > 0){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ya existe en el sistema.';
    }
}
