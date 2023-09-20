<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'adopter_id', 'reason', 'status', 'application_date'
    ];

    public function adopter() : BelongsTo
    {
        return $this->belongsTo(Adopter::class);
    }

    public function pet() : BelongsTo 
    {
        return $this->belongsTo(Pet::class);
    }
}
