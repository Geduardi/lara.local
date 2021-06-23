<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:191'],
            'category_id' => ['required', 'int'],
            'short_description' => ['required', 'string'],
            'description' => ['string'],
            'image' => ['sometimes']
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Необходимо выбрать категорию',
            'short_description.required' => 'Описание новости обязательно'
        ];
    }
}

