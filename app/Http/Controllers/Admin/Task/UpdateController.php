<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task = $this->service->update($data, $task);

        return view('admin.task.show', compact('task'));
    }
}
