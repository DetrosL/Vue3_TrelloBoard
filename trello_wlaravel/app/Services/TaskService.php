<?php

namespace App\Services;
use App\Models\{Task, Tag, Step, TagTask};

class TaskService implements TaskServiceInterface
{
    public function createTag(Task $task, array $tags): object
    {
        $tagIds = collect($tags)->pluck('id')->filter()->toArray();
        $createdPivots = collect();

        foreach ($tagIds as $tagId) {
            $pivot = TagTask::firstOrCreate([
                'task_id' => $task->id,
                'tag_id'  => $tagId,
            ]);

            $createdPivots->push($pivot);
        }

    // dd($createdPivots->toArray());

        return $createdPivots;
    }

    public function updateTag(Task $task, array $tags): object
    {
        $tagIds = collect($tags)->pluck('id')->filter()->toArray();

        $task->tags()->sync($tagIds);

        return $task->tags;
    }


    public function createStep(Task $task, array $steps): object
    {
        foreach ($steps as $stepData) {
            $stepData['task_id'] = $task->id;
            $stepCreated = Step::create($stepData);
        }

        return $stepCreated;
    }

    public function updateStep(Task $task, array $steps): object
    {
        $task->steps()->delete();

        foreach ($steps as $stepData) {
            $stepData['task_id'] = $task->id;
            Step::create($stepData);
        }

        return $task->steps;
    }

}