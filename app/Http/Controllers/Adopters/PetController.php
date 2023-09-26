<?php

namespace App\Http\Controllers\Adopters;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function show(Pet $pet)
    {
        return view('adopters.pet-show',compact('pet'));
    }
}
