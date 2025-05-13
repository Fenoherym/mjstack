<?php

namespace App\Models;

use Shah\Novus\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'author_name',
        'author_email',
        'is_approved',
        'novus_post_id'
    ];

    protected $casts = [
        'is_approved' => 'boolean'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    
}
