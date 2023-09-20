<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'species_id', 'breed_id', 'name', 'dob', 'gender', 'height', 'weight'
    ];

    public function specie() : BelongsTo 
    {
        return $this->belongsTo(Species::class);
    }

    public function breed() : BelongsTo 
    {
        return $this->belongsTo(Breed::class);
    }

    public function adoptions() : HasMany
    {
        return $this->hasMany(Adoption::class);
    }

    public function medical_histories() : HasMany 
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function bookmarks() : HasMany 
    {
        return $this->hasMany(Bookmark::class);
    }
}
