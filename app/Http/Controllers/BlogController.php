<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Article::with(['tags', 'comments', 'views'])
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(12);

        $tags = Tag::all();

        return view('blog.index', compact('posts', 'tags'));
    }

    public function show(Article $article)
    {
        // Record the view
        $article->views()->create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);              

        return view('blog.show', compact('article'));
    }
}
