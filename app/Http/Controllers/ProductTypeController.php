<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeList = ProductType::orderBy('nama')->get();

        return view('pages.product_type.index', compact('typeList'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productType = ProductType::orderBy('nama')->get();

        $data = [
            'productTypes' => $productType,
        ];
        
        return view('pages.product_type.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\ProductTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
        $validatedData = $request->validated();

        $productType = ProductType::create($validatedData);

        return redirect()->route('product-type.index')
                ->with('success', 'Data unit sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        return view('pages.product_type.detail', compact('productType'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('pages.product_type.edit', compact('productType'));
    }
    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\ProductTypeRequest  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, ProductType $productType)
    {
        $validatedData = $request->validated();

        // $validatedData['updated_by'] = auth()->id();

        $productType->update($validatedData);
    
        return redirect()->route('product-type.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
    
        return redirect()->route('product-type.index')->with('success', 'Product Type deleted successfully.');
    }
}
