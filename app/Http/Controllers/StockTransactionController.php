<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockTransactionRequest;
use App\Models\Stock;
use App\Models\StockTransaction;

class StockTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionList = StockTransaction::get();

        return view('pages.stock_transaction.index', compact('transactionList'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stockTransactions = StockTransaction::with('unit')
            ->join('units', 'stock_transactions.unit_id', '=', 'units.id')
            ->orderBy('units.nama')
            ->get();

        $stocks = Stock::join('products', 'stocks.product_id', '=', 'products.id')
                ->with(['product.productType'])
                ->orderBy('products.nama', 'asc')
                ->get();

        $data = [
            'stockTransactions' => $stockTransactions,
            'stocks' => $stocks,
        ];
        
        return view('pages.stock_transaction.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\StockTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockTransactionRequest $request)
    {
        $validatedData = $request->validated();

        $stockTransaction = StockTransaction::create($validatedData);
    
        return redirect()->route('stock-transaction.index')
            ->with('success', 'Data transaction berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\StockTransaction  $stockTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(StockTransaction $stockTransaction)
    {
        return view('pages.stock_transaction.detail', compact('stockTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\StockTransaction  $stockTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(StockTransaction $stockTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\StockTransactionRequest  $request
     * @param  \App\StockTransaction  $stockTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(StockTransactionRequest $request, StockTransaction $stockTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\StockTransaction  $stockTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockTransaction $stockTransaction)
    {
        $stockTransaction->delete();

        return redirect()->route('stock-transaction.index')->with('success', 'Transaction deleted successfully.');
    }
}
