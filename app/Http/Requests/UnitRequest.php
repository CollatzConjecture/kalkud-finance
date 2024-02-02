<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uuid' => 'required|string|max:255|unique:units,uuid',
            'nama' => 'required|string|max:255|in:Ciateul,Koper,MW,TKI',
            'jenis' => 'required|string|max:100|in:SD,SMP,SMA',
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
            'jenis.required' => 'The type is required.',
        ];
    }
}
