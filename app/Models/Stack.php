<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stack extends Model
{
    protected $fillable = [
        "name"
    ];


    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
    
}
