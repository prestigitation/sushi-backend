<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AdjacentSelectorValues implements Rule
{
    public $values = [1,2]; // значения, которые появляются на кнопке(их числовые значения)
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
        return in_array($value,$this->values);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пункты с кнопки должны иметь следующие значения:'.json_encode($this->values);
    }
}
