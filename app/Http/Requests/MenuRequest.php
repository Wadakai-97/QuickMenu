<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'timezone' => ['required', 'string'],
            'category' => ['required'],
            'dish_name' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'timezone' => '項目名',
            'category' => '分類',
            'dish_name' => '料理名',
        ];
    }

    public function messages() {
        return [
            'timezone.required' => ':attributeは選択必須です。',
            'category.required' => ':attributeは選択必須です。',
            'dish_name.required' => ':attributeは入力必須です。'
        ];
    }
}
