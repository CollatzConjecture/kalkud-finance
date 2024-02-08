<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockTransactionRequest extends FormRequest
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
            'tipe' => 'required|in:Barang Masuk,Barang Keluar',
            'tanggal_berlaku' => 'required|date',
            'stock_id' => 'nullable|exists:stocks,id',
            'unit_id' => 'nullable|exists:units,id',
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

            'tipe.required' => 'The type is required.',
            'tipe.in' => 'The selected type is invalid. It must be either "Barang Masuk" or "Barang Keluar".',
            
            'tanggal_berlaku.required' => 'The effective date is required.',
            'tanggal_berlaku.date' => 'The effective date is not a valid date.',
            
            'stock_id.exists' => 'The selected stock is invalid.',
            'stock_id.nullable' => 'The stock is optional.',

            'unit_id.exists' => 'The selected unit is invalid.',
            'unit_id.nullable' => 'The unit is optional.',
        ];
    }
}
