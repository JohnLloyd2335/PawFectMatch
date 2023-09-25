<?php

namespace App\Livewire\Admin;

use App\Models\Breed;
use App\Models\Pet;
use App\Models\Species;
use Livewire\Component;
use Livewire\WithPagination;

class PetTable extends Component
{
    use WithPagination;

    public $search;
    public $species_id;
    public $breed_id;


    public function render()
    {
        $species = Species::pluck('name','id')->toArray();
        $breeds = Breed::pluck('name','id')->toArray();

        $petsQuery = Pet::where('name','like','%'.$this->search.'%');

        if(!empty($this->species_id)){
            $petsQuery->where('species_id',$this->species_id);
            
        }

        if(!empty($this->breed_id)){
            $petsQuery->where('breed_id',$this->breed_id);
        }

        $pets = $petsQuery->orderBy('id','desc')->paginate(5);
        
        return view('livewire.admin.pet-table',compact('species','breeds','pets'));
    }
}
