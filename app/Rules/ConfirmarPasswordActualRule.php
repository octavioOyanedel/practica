<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class ConfirmarPasswordActualRule implements Rule
{
    protected $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        $usuario = User::find($this->id);
        $pass_actual = $usuario->password;
        if(1 === 1){
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
        return 'no es corresponde a la actual.';
    }
}
