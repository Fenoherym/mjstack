<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    protected $fillable = ['post_id', 'ip_address', 'user_agent'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}