<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\TagsFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function comics()
    {
        return $this->hasMany(Comic::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
