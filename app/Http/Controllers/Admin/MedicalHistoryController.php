<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePetMedRecordRequest;
use App\Models\Breed;
use App\Models\MedicalHistory;
use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.medical_history.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $species = Species::pluck('name','id')->toArray();

        if($request->ajax()){
            if($request->has('species_id') && $request->has('breed_id')){
                $pets = Pet::where('species_id',$request->species_id)->where('breed_id',$request->breed_id)
                        ->pluck('name','id')->toArray();
                return response()->json($pets);
            }

            if($request->has('species_id')){
                $breeds = Breed::where('species_id',$request->species_id)->pluck('name','id')->toArray();
                return response()->json($breeds);
            }
        }
        return view('admin.medical_history.create',compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetMedRecordRequest $request)
    {
        MedicalHistory::create([
            'pet_id' => $request->pet,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'checkup_date' => $request->checkup_date
        ]);

        return redirect()->route('admin.pet.medical_history.index')->with('succes','Medical Record Successfully Added');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
