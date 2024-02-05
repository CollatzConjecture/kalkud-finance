<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255|',
            'harga_beli_satuan' => 'required|integer|min:0',
            'harga_jual_satuan' => 'required|integer|min:0',
            'tanggal_berlaku' => 'required|date',
            'product_type_id' => 'nullable|exists:product_types,id',
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

            'harga_beli_satuan.required' => 'The purchase price is required.',
            'harga_beli_satuan.integer' => 'The purchase price must be a number.',
            'harga_beli_satuan.min' => 'The purchase price cannot be negative.',

            'harga_jual_satuan.required' => 'The selling price is required.',
            'harga_jual_satuan.integer' => 'The selling price must be a number.',
            'harga_jual_satuan.min' => 'The selling price cannot be negative.',
            
            'tanggal_berlaku.required' => 'The effective date is required.',
            'tanggal_berlaku.date' => 'The effective date is not a valid date.',
            
            'product_type_id.exists' => 'The selected product type is invalid.',
            'product_type_id.nullable' => 'The product type is optional.',
        ];
    }
}
