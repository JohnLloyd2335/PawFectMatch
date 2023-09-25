<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePetRequest;
use App\Http\Requests\Admin\UpdatePetRequest;
use App\Models\Breed;
use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pet.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $species = Species::pluck('name','id')->toArray();
        $breeds = Breed::pluck('name','id')->toArray();

        if($request->ajax()){
            $breeds = Breed::where('species_id',$request->species_id)
                     ->pluck('name','id')->toArray();
            return response()->json($breeds);
        }

        return view('admin.pet.create',compact('species','breeds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        if($request->hasFile('image')){
            $file_path = $request->file('image')->store('pets','public');
        }

        Pet::create([
            'species_id' => $request->species,
            'breed_id' => $request->breed,
            'name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'image' => $file_path
        ]);

        return redirect()->route('admin.pet.index')->with('success','Pet Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('admin.pet.show',compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('admin.pet.edit',compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);   

        return redirect()->route('admin.pet.index')->with('success','Pet Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet  $pet)
    {
        $pet->delete();

        return redirect()->route('admin.pet.index')->with('success', 'Record Successfully Deleted');
    }
}
