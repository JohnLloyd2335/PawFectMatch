<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adopter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'mobile_number', 'bio'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function adoptions() : HasMany
    {   
        return $this->hasMany(Adoption::class);
    }

    public function bookmarks() : HasMany
    {
        return $this->hasMany(Bookmark::class);
    }
}
