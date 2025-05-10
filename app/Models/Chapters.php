<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    /** @use HasFactory<\Database\Factories\ChaptersFactory> */
    use HasFactory;

    protected $fillable = [
        'comic_id',
        'title',
        ''
    ];
    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
