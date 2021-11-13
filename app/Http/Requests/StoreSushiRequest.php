<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreSushiRequest extends FormRequest
{

    /**
     * Return validation errors as json response
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 'failure',
            'status_code' => 400,
            'message' => 'Bad Request',
            'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
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
            'name' => 'required|string|max:255',
            'image_path' => 'required|string|max:255',
            'slug' => 'nullable',
            'price' => 'required|integer',
            'discount_price' => 'nullable',
            'gram_count' => 'required|integer',
            'pieces_count' => 'required|integer',
            'consist' => 'required'
        ];
    }

    public function messages():array
	{
		return [
		    'name.required' => 'Необходимо заполнить имя',
            'image_path.required' => 'Введите адрес, по которому должно располагаться изображение выбранного продукта'
		];
	}
}
