<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            $tag->update($data);
        }else{
            abort(504);
        }
        return view('admin.tag.show', compact('tag'));
    }
}
