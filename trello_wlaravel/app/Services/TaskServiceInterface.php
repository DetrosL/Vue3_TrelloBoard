<?php

namespace App\Services;
use App\Models\{Task, Tag, Step};

interface TaskServiceInterface
{
    public function createTask(Task $task): bool;
    public function createTag(Tag $tag): bool;
    public function createStep(Step $step): bool;
}