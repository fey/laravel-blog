<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
            'id'   => 'required|integer|exists:articles',
            'name' => [
                'required',
                'string',
                Rule::unique('articles', 'name')->ignore($this->id),
                'between:5, 140'
            ],
            'body' => 'required|string|between:4,4000'
        ];
    }
}
