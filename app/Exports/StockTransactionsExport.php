<?php

namespace App\Exports;

use App\Models\StockTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StockTransactionsExport implements FromCollection, WithHeadings, WithMapping
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
        return StockTransaction::whereBetween('tanggal_berlaku', [$this->start_date, $this->end_date])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Stock ID',
            'Unit ID',
            'Harga Beli',
            'Harga Jual',
            'Quantity',
            'Tipe',
            'Tanggal Berlaku',
            'Created At',
            'Updated At',
        ];
    }

    public function map($stockTransaction): array
    {
        return [
            $stockTransaction->id,
            $stockTransaction->stock_id,
            $stockTransaction->unit_id,
            $stockTransaction->harga_beli,
            $stockTransaction->harga_jual,
            $stockTransaction->qty,
            $stockTransaction->tipe,
            $stockTransaction->tanggal_berlaku,
            $stockTransaction->created_at,
            $stockTransaction->updated_at,
        ];
    }
}
