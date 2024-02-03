<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitList = Unit::orderBy('nama')->get();

        return view('pages.unit.index', compact('unitList'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::orderBy('nama')->get();

        $data = [
            'units' => $unit,
        ];
        
        return view('pages.unit.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\UnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $validatedData = $request->validated();

        $unit = Unit::create($validatedData);

        return redirect()->route('unit.index')
                ->with('success', 'Data unit sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('pages.unit.detail', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('pages.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\UnitRequest  $request
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $validatedData = $request->validated();

        // $validatedData['updated_by'] = auth()->id();

        $unit->update($validatedData);
    
        return redirect()->route('unit.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
    
        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully.');
    }
}
