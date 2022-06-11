<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        if (auth()->user()->role == 0) {
            $category->delete();
        } else {
            abort(504);
        }
        return redirect()->route('admin.category.index');
    }
}
