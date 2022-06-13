<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class LikedController extends Controller
{
    public function __invoke()
    {
        return view('personal.liked.index');
    }
}
