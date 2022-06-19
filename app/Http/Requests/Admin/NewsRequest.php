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
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:50'],
            'category_id' => [
                'required',
                'min:1',
                'integer',
                'exists:categories,id'
            ],
            'image' => [
                'image',
                'nullable',
                'max:1999',
                'mimes:jpeg,png,jpg,gif,svg'
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth('web')->id()
        ]);
    }
}
