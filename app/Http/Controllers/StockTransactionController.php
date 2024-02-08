<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockTransactionRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\StockTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\StockTransaction  $stockTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(StockTransaction $stockTransaction)
    {
        //
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
        //
    }
}
