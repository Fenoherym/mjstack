<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'author_name',
        'author_email',
        'is_approved',
        'article_id'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
