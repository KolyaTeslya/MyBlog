<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.task.create', compact( 'tags'));
    }
}
