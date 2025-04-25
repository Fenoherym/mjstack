<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'url',
        'repository',
        'image'
        
    ];

    public function stacks(): BelongsToMany
    {
        return $this->belongsToMany(Stack::class);
    }

}
