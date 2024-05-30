<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordingPodcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_podcast',
        'photo',
        'genre_podcast',
        'recording',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
