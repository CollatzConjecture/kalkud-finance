<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Product;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockList = Stock::get();

        return view('pages.stock.index', compact('stockList'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = Stock::get();

        $products = Product::with('productType')->orderBy('nama')->get();
    
        $data = [
            'stocks' => $stocks,
            'products' => $products,
        ];
        
        return view('pages.stock.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\StockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        $validatedData = $request->validated();

        $stock = Stock::create($validatedData);

        return redirect()->route('stock.index')
                ->with('success', 'Data Stock berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('pages.stock.detail', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response 
     */
    public function edit(Stock $stock)
    {
        $products = Product::with('productType')->orderBy('nama')->get();
    
        return view('pages.stock.edit', compact('stock', 'products'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\StockRequest  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $request, Stock $stock)
    {
        $validatedData = $request->validated();

        // $validatedData['updated_by'] = auth()->id();

        $stock->update($validatedData);
    
        return redirect()->route('stock.index')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response 
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stock.index')->with('success', 'Stock deleted successfully.');
    }
}
