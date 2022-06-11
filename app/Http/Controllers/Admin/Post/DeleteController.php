<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        if (auth()->user()->role == 0) {
            $post->delete();
        }else{
            abort(504);
        }
        return redirect()->route('admin.post.index');
    }
}
