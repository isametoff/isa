<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __invoke(Comment $comments)
    {
        $comments = auth()->user()->comments;
        return view('personal.comment.index', compact('comments'));
    }
}
