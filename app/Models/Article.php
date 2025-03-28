<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
        'featured_image',
        'excerpt',
        'is_published'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean'
    ];


    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'excerpt' => $this->excerpt,
            // Nous retirons la recherche dans les tags car c'est une relation
        ];
    }

  
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(PostView::class);
    }

    public function getViewsCount(): int
    {
        return $this->views()->count();
    }

    public function video(): BelongsTo 
    {
        return $this->belongsTo(Video::class);
    }
}
