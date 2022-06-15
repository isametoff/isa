<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class PostController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.post.index', compact('posts'));
    }
}
