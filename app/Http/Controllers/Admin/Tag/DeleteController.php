<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        if (auth()->user()->role == 0) {
            $tag->delete();
        }else{
            abort(504);
        }
        return redirect()->route('admin.tag.index');
    }
}
