<?php

namespace App\Services;
use App\Models\{Task, Tag, Step, TaskTag};

class TaskService implements TaskServiceInterface
{
    public function createTag(Task $task, array $tags): object
    {
        $tagIds = collect($tags)->pluck('id')->filter()->toArray();
        $createdPivots = collect();

        foreach ($tagIds as $tagId) {
            $pivot = TaskTag::firstOrCreate([
                'task_id' => $task->id,
                'tag_id'  => $tagId,
            ]);

            $createdPivots->push($pivot);
        }

        return $createdPivots;
    }

    public function createStep(Task $task, array $steps): object
    {
        foreach ($steps as $stepData) {
            $stepData['task_id'] = $task->id;
            $stepCreated = Step::create($stepData);
        }

        return $stepCreated;
    }
}