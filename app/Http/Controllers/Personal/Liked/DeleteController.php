<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        if (auth()->user()->role == 0) {
            auth()->user()->likedPosts()->detach($post->id);
        }else{
            abort(504);
        }
        return redirect()->route('personal.liked.index');
    }
}
