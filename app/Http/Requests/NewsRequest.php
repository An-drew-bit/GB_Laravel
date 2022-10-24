<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'author' => ['required'],
            'content' => ['required'],
            'image' => [
                'image',
                'max:1999',
                'mimes:jpeg,png,jpg,gif,svg'
            ]
        ];
    }
}
