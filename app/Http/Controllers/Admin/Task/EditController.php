<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;

use App\Models\Task;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Task $task)
    {
        $tags = Tag::all();
        return view('admin.task.edit', compact('task', 'tags'));
    }
}
