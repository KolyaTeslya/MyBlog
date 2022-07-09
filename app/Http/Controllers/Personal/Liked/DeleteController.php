<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Task;

class DeleteController extends Controller
{
    public function __invoke(Task $post)
    {
         auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}
