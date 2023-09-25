<?php

namespace App\Livewire\Adopters;

use App\Models\Breed;
use App\Models\Pet;
use App\Models\Species;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
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
            if(!in_array($this->species_id,[0,"0"])){
                $petsQuery->where('species_id',$this->species_id);
            }
           
        }

        if(!empty($this->breed_id)){
            if(!in_array($this->breed_id,[0,"0"])){
                $petsQuery->where('breed_id',$this->breed_id);
            }
           
        }
        $pets = $petsQuery->paginate(8);

        return view('livewire.adopters.home',[
            'pets' =>  $pets,
            'species' => $species,
            'breeds' => $breeds
        ]);
    }

    public function filterPets()
    {
       $this->resetPage();
    }

    public function cancelFilter()
    {   
        $this->species_id = null;
        $this->breed_id = null;
        $this->search = null;
        $this->resetPage();
    }

  
}
