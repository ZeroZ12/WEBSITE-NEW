<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\TagsFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'link',
        'category_id',
        'image',
        'trailer',
        'duration',
        'release_date',
        'rating',
        'views',
        'status',
        'user_id',
        'is_featured',
        'language',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany( Tags::class, 'movie_tags');
    }

    public function ratings()
    {
        return $this->morphMany(Ratings::class, 'rateable');
    }
}
