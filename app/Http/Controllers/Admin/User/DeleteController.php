<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
    	if (auth()->user()->role == 0) {
            $user->delete();
        }else{
            abort(504);
        }
        return redirect()->route('admin.user.index');
    }
}
