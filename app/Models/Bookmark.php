<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id', 'adopter_id', 'bookmark_date'
    ];

    public function pet() :BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function bookmark() : BelongsTo 
    {
        return $this->belongsTo(Bookmark::class);
    }
}
