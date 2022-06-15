<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $posts = Post::all()->random(4);
        $date = Carbon::parse($post->created_at);
        $update = Carbon::parse($post->updated_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->random(3, $post->id);
        return view('post.show', compact('post', 'posts', 'date', 'relatedPosts', 'update'));
    }
}
