<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AnexoRule implements Rule
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
        if(strlen($value) == 4){
            //convertir rut en array
            $arrayRut = str_split($value);
            //recorrer array en busca de letras
            for($i = 0; $i < sizeof($arrayRut)-1; $i++){
                if(preg_match("/^[a-zA-Z]*$/",$arrayRut[$i])){
                    return false;
                }
            }
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
        return 'no válido.';
    }
}
