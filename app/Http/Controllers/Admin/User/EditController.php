<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Http\Request;

use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
    	$roles = User::getRole();
        return view('admin.user.edit', compact('user','roles'));
    }
}
