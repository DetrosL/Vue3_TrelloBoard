<?php

namespace App\Services;
use App\Models\{Task, Tag, Step};

class TaskService implements TaskServiceInterface
{
    public function createTask(Task $task): bool{
        

        return true;
    }
    public function createTag(Tag $tag): bool{
        //
        
        return true;
    }
    public function createStep(Step $step): bool{
        // 
        return true;
    }

}