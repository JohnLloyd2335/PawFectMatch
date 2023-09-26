<?php

namespace App\Livewire\Admin;

use App\Models\MedicalHistory;
use Livewire\Component;
use Livewire\WithPagination;

class PetMedicalHistoryTable extends Component
{
    use WithPagination;
    public $pet;

    public function render()
    {
        $petId = $this->pet->id;
        $medical_histories = MedicalHistory::where('pet_id',$petId)->paginate(1);
        return view('livewire.admin.pet-medical-history-table',compact('medical_histories'));
    }
}
