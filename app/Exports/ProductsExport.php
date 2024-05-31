<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        return Product::whereBetween('tanggal_berlaku', [$this->start_date, $this->end_date])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Type ID',
            'Nama',
            'Harga Beli Satuan',
            'Harga Jual Satuan',
            'Tanggal Berlaku',
            'Created At',
            'Updated At',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->product_type_id,
            $product->nama,
            $product->harga_beli_satuan,
            $product->harga_jual_satuan,
            $product->tanggal_berlaku,
            $product->created_at,
            $product->updated_at,
        ];
    }
}
