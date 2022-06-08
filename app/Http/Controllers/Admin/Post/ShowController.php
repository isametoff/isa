<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
