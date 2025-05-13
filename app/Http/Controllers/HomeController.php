<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Shah\Novus\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'comments'])
            ->where('status', 2)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('welcome', [
            "posts" => $posts,
            "last_video" => Video::orderBy("created_at","desc")->first(),
        ]);
    }
}
