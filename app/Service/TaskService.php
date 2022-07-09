<?php

namespace App\Service;

use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaskService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $task = Task::firstOrCreate($data);

            if (isset($tagIds)){
                $task->tags()->attach($tagIds);
            }
            DB::commit();
        }  catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $task)
    {
        try {
        Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

        $task->update($data);
        if (isset($tagIds)){
            $task->tags()->sync($tagIds);
        }
        DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $task;
    }
}
