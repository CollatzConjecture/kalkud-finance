<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $uniqueRule = Rule::unique('product_types', 'nama');
        if ($this->productType) {
            $uniqueRule = $uniqueRule->ignore($this->productType);
        }
        
        return [
            'nama' => [
                'required',
                'string',
                'max:255',
                $uniqueRule,
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'The name is required.',
            'nama.unique' => 'The name must be unique.',
        ];
    }
}
