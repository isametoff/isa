<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
    	$data = $request->validated();
    	// dd($data);
    	$data['password'] = Hash::make($data['password']);
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}
