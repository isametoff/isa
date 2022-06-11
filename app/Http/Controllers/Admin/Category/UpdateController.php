<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            $category->update($data);
        }else{
            abort(504);
        }
        return view('admin.category.show', compact('category'));
    }
}
