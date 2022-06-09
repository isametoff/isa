<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class indexController extends Controller
{
    public function __invoke()
    {
    	$users = User::all();
    	return view('admin.user.index',compact('users'));
    }
}
