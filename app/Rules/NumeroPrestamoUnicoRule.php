<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Prestamo;

class NumeroPrestamoUnicoRule implements Rule
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
        $prestamo = Prestamo::where('numero_prestamo','=',$value);
        if($prestamo->count() > 0){
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
        return 'número prestamo ya existe en el sistema.';
    }
}
