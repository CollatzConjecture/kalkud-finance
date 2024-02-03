<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use Flasher\Notyf\Prime\NotyfFactory;
use App\Models\Unit;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $validatedData = $request->validated();

        $unit = Unit::create($validatedData);

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $Unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $id, NotyfFactory $flasher)
    {
        $id->delete();
        $flasher->addSuccess('Data unit berhasil dihapus');
    
        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully.');
    }
}
