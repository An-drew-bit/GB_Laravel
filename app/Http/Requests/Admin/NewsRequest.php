<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:30'],
            'image' => [
                'image',
                'nullable',
                'max:1999',
                'mimes:jpeg,png,jpg,gif,svg'
            ],
            //'category_id' => []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('web')->id()
        ]);
    }
}
