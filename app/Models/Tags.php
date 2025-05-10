<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    /** @use HasFactory<\Database\Factories\TagsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];
    public function comics()
    {
        return $this->belongsToMany(Comic::class, 'comic_tags');
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_tags');
    }
}
