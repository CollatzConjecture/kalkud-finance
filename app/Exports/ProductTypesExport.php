<?php

namespace App\Exports;

use App\Models\ProductType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductTypesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return ProductType::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Created At',
            'Updated At',
        ];
    }

    public function map($productType): array
    {
        return [
            $productType->id,
            $productType->nama,
            $productType->created_at,
            $productType->updated_at,
        ];
    }
}
