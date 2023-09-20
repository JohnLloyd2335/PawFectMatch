<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'diagnosis', 'treatment', 'checkup_date'
    ];

    public function medical_history() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
