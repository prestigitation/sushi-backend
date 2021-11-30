<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidOrderCartJson implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cart = json_decode($value);
        return count($cart) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'В корзине должен присутствовать хоть 1 товар, который присутствует на данный момент в магазине.';
    }
}
