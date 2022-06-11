<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (auth()->user()->role == 0) {
            $this->service->store($data);
        }else{
            abort(504);
        }
        return redirect()->route('admin.post.index');
    }
}
