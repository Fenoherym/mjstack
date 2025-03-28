<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
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

        return view('welcome', [
            "posts" => $posts,
            "last_video" => Video::orderBy("created_at","desc")->first(),
        ]);
    }
}
