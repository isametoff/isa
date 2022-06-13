<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        if (auth()->user()->role == 0) {
            $comment->delete();
        }else{
            abort(504);
        }
        return redirect()->route('personal.comment.index');
    }
}
