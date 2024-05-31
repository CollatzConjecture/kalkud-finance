<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StocksExport;
use App\Exports\ProductsExport;
use App\Exports\ProductTypesExport;
use App\Exports\StockTransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.export.index');
    }

    /**
     * Handle the export request.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|string'
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $type = $request->input('type');

        switch ($type) {
            case 'stocks':
                return Excel::download(new StocksExport($start_date, $end_date), 'stocks.xlsx');
            case 'products':
                return Excel::download(new ProductsExport($start_date, $end_date), 'products.xlsx');
            case 'product_types':
                return Excel::download(new ProductTypesExport(), 'product_types.xlsx');
            case 'stock_transactions':
                return Excel::download(new StockTransactionsExport($start_date, $end_date), 'stock_transactions.xlsx');
            default:
                return redirect()->back()->with('error', 'Invalid export type selected.');
        }
    }
}
