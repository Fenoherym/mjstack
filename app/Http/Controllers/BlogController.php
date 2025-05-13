<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Shah\Novus\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }

    public function show(Post $article)
    {
        // // Record the view
        // $article->views()->create([
        //     'ip_address' => request()->ip(),
        //     'user_agent' => request()->userAgent()
        // ]);              

        return view('blog.show', compact('article'));
    }
}
