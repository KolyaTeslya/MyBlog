<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Requests\Admin\Task\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.task.index');
    }
}

