<?php

namespace App\Http\Requests;

use App\Rules\AdjacentSelectorValues;
use App\Rules\ValidOrderCartJson;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sum' => 'integer',
            'name' => 'string|max:255|required',
            'phone' => 'string|max:255|required',
            'comment' => 'string|max:255|nullable',
            'street' => 'string|max:255|required',
            'house' => 'integer|required',
            'apartment' => 'integer|required',
            'entrance' => 'integer',
            'house_code' => 'integer',
            'floor' => 'integer',
            'delivery_type' => ['integer','required', new AdjacentSelectorValues],
            'payment_type' => ['integer','required', new AdjacentSelectorValues],
            'time_type' => ['integer','required', new AdjacentSelectorValues],
            'cart' => ['json','required', new ValidOrderCartJson]
        ];
    }
}
