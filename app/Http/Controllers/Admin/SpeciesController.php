<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSpeciesRequest;
use App\Http\Requests\Admin\UpdateSpecieRequest;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.species.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.species.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpeciesRequest $request)
    {
        Species::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.species.index')->with('success','Species Successfully Created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Species $species)
    {
        return view('admin.species.edit',compact('species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecieRequest $request, Species $species)
    {
        $species->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.species.index')->with('success','Species Successfully Update');
    }

}
