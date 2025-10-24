<?php

namespace App\Services;
use App\Models\{Task, Tag, Step};

interface TaskServiceInterface
{
    public function createTag(Task $task, array $tag): object;
    public function updateTag(Task $task, array $tag): object;
    public function createStep(Task $task, array $step): object;
    public function updateStep(Task $task, array $step): object;
}