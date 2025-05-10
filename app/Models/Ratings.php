<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    /** @use HasFactory<\Database\Factories\RatingsFactory> */
    use HasFactory;

    protected $fillable = [
        'ratable_id',
        'ratable_type',
        'user_id',
        'rating',
    ];

    public function ratable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
