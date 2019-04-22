<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordsIgualesRule implements Rule
{
    protected $cont;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($contrasena1)
    {
        $this->cont = $contrasena1;
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
        $contrasena1 = $this->cont;
        $contrasena2 = $value;
        if(strcmp($contrasena1, $contrasena2) === 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'no son iguales.';
    }
}
