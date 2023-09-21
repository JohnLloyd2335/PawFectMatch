<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBreedRequest;
use App\Http\Requests\Admin\UpdateBreedRequest;
use App\Models\Breed;
use App\Models\Species;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.breed.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = Species::pluck('name','id')->toArray();
        return view('admin.breed.create',compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBreedRequest $request)
    {
        Breed::create([
            'species_id' => $request->species,
            'name' => $request->name
        ]);

        return redirect()->route('admin.breed.index')->with('success','Breed Successfully Created');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Breed $breed)
    {
        $species = Species::pluck('name','id')->toArray();
        return view('admin.breed.edit',compact('breed','species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBreedRequest $request,  Breed $breed)
    {
        $breed->update([
            'name' => $request->name,
            'species_id' => $request->species
        ]);

        return redirect()->route('admin.breed.index')->with('success','Breed Successfully Updated');
    }

   
}
