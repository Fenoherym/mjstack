<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    protected $fillable = [
        "title",
        "url"
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
