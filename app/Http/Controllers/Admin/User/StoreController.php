<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            StoreUserJob::dispatch($data);
        }else{
            abort(504);
        }

        return redirect()->route('admin.user.index');
    }
}
