<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Breed;
use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $species_count = Species::count();
        $breed_count = Breed::count();
        $pet_count = Pet::count();
        $adopted_pet_count = Adoption::where('status','Approved')->count();
        $available_pet_count = Adoption::whereNot('status','Approved')->count();
        $new_pets = Pet::latest()->limit(5)->get();
        $latest_requested_adoptions = Adoption::latest()->limit(5)->get();

        return view('admin.dashboard', compact('species_count','breed_count','pet_count','adopted_pet_count','available_pet_count','new_pets','latest_requested_adoptions'));
    }
}
