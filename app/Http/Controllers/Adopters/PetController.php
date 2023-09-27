<?php

namespace App\Http\Controllers\Adopters;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function show(Pet $pet)
    {
        // $unavailable_pet_ids = Adoption::where('adopter_id',auth()->user()->adopter->id)->whereIn('status',['Pending','Approved'])->get();
        $unavailable_pet_ids = Pet::select('id')->whereHas('adoptions',function($query){
            $query->whereIn('status',['Pending','Approved']);
        })->pluck('id')->toArray();
        return view('adopters.pet-show',compact('pet','unavailable_pet_ids'));
    }
}
