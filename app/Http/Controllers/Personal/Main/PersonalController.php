<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostUserLike;

class PersonalController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['commentCount'] = Comment::all()->count();
        // $posts = auth()->user()->likedPosts;
        $data['likedCount'] = auth()->user()->likedPosts->count();
        return view('personal.main.index', compact('data'));
    }
}
