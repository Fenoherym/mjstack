<?php

namespace App\Models;

use Shah\Novus\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    protected $fillable = [
        "title",
        "url"
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
}
