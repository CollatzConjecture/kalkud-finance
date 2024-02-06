<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'harga_beli' => 'required|integer|min:0',
            'harga_jual' => 'required|integer|min:0',
            'qty' => 'required|integer|min:0',
            'tanggal_berlaku' => 'required|date',
            'product_id' => 'nullable|exists:products,id',
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
            'harga_beli.required' => 'The purchase price is required.',
            'harga_beli.integer' => 'The purchase price must be a number.',
            'harga_beli.min' => 'The purchase price cannot be negative.',

            'harga_jual.required' => 'The selling price is required.',
            'harga_jual.integer' => 'The selling price must be a number.',
            'harga_jual.min' => 'The selling price cannot be negative.',

            'qty.required' => 'The selling price is required.',
            'qty.integer' => 'The selling price must be a number.',
            'qty.min' => 'The selling price cannot be negative.',
            
            'tanggal_berlaku.required' => 'The effective date is required.',
            'tanggal_berlaku.date' => 'The effective date is not a valid date.',
            
            'product_id.exists' => 'The selected product is invalid.',
            'product_id.nullable' => 'The product is optional.',
        ];
    }
}
