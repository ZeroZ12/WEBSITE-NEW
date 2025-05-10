<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    /** @use HasFactory<\Database\Factories\ComicTagsFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'cover_image',
        'author',
        'publisher',
        'chapters',
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

    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'comic_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->morphMany(Ratings::class, 'rateable');
    }

    public function chapters()
    {
        return $this->hasMany(Chapters::class);
    }
}
