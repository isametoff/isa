<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            Tag::firstOrCreate($data);
        }else{
            abort(504);
        }
        return redirect()->route('admin.tag.index');
    }
}
