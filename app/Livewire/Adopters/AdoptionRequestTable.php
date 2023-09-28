<?php

namespace App\Livewire\Adopters;

use App\Models\Adoption;
use App\Models\Breed;
use App\Models\Pet;
use App\Models\Species;
use Livewire\Component;
use Livewire\WithPagination;

class AdoptionRequestTable extends Component
{
    use WithPagination;

    public $search;
    public $species_id;
    public $breed_id;


    public function render()
    {
        $species = Species::pluck('name','id')->toArray();
        $breeds = Breed::pluck('name','id')->toArray();

        $adoptionsQuery = Adoption::whereHas('pet', function($query){
            $query->where('name','like','%'.$this->search.'%');
        });

        if(!empty($this->species_id)){
            $adoptionsQuery->whereHas('pet', function($query){
                $query->where('species_id',$this->species_id);
            });
            
        }

        if(!empty($this->breed_id)){
            $adoptionsQuery->whereHas('pet', function($query){
                $query->where('breed_id',$this->breed_id);
            });
        }

        $adoptions = $adoptionsQuery->where('adopter_id',auth()->user()->adopter->id)->orderBy('id','desc')->paginate(5);
        return view('livewire.adopters.adoption-request-table',compact('species','breeds','adoptions'));
    }
}
