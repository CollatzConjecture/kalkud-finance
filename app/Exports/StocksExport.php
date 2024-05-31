<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StocksExport implements FromCollection, WithHeadings, WithMapping
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
        return Stock::whereBetween('tanggal_berlaku', [$this->start_date, $this->end_date])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product ID',
            'Harga Beli',
            'Harga Jual',
            'Quantity',
            'Tanggal Berlaku',
            'Created At',
            'Updated At',
        ];
    }

    public function map($stock): array
    {
        return [
            $stock->id,
            $stock->product_id,
            $stock->harga_beli,
            $stock->harga_jual,
            $stock->qty,
            $stock->tanggal_berlaku,
            $stock->created_at,
            $stock->updated_at,
        ];
    }
}
