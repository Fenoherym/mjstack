<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Article::with(['tags', 'comments', 'views'])
            ->where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('welcome', compact('posts'));
    }
}
