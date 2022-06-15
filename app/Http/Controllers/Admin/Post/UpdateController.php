<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            $post = $this->service->update($data, $post);
        }else{
            abort(504);
        }
        return redirect()->route('post.show', compact('post'));
    }
}
