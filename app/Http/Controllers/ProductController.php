<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::orderBy('nama')->get();

        return view('pages.product.index', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::orderBy('nama')->get();
        $productType = ProductType::orderBy('nama')->get();

        $data = [
            'product' => $product,
            'productTypes' => $productType,
        ];
        
        return view('pages.product.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        $productType = Product::create($validatedData);

        return redirect()->route('product.index')
                ->with('success', 'Data unit sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
