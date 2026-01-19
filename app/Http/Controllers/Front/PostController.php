<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;

class PostController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id','desc')->paginate(3);
        return view('front.blog', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('front.post', compact('post'));
    }

    public function post_by_category($slug)
    {
        
    }
}
