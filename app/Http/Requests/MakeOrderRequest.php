<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sum' => 'string|max:255',
            'name' => 'string|max:255',
            'phone' => 'string|max:255',
            'comment' => 'string|max:255|nullable',
            'street' => 'string|max:255',
            'house' => 'string|max:255',
            'apartment' => 'string|max:255',
            'entrance' => 'string|max:255',
            'house_code' => 'string|max:255',
            'floor' => 'string|max:255',
            'delivery_type' => 'integer',
            'payment_type' => 'integer',
            'time_type' => 'integer',
            'cart' => 'json|required'
        ];
    }
}
