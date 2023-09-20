<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shelter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'location', 'email', 'mobile_number'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
