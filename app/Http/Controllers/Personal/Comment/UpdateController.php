<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            $comment->update($data);
        } else {
            abort(504);
        }
        return redirect()->route('personal.comment.index', compact('comment'));
    }
}
