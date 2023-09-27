<?php

namespace App\Http\Controllers\Adopters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adopters\StoreAdoptionRequest;
use App\Models\Adoption;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class AdoptionsController extends Controller
{
    public function create(Pet $pet)
    {
        return view('adopters.adoptions.create',compact('pet'));
    }

    public function store(StoreAdoptionRequest $request, Pet $pet)
    {
        Adoption::create([
            'pet_id' => $pet->id,
            'adopter_id' => auth()->user()->adopter->id,
            'reason' => $request->reason_for_adoption,
            'application_date' => now()->format('Y-m-d')
        ]);

        return redirect()->route('adopters.pet.show',$pet)->with('success','Adoption Request Successfully Submitted');
    }
}
