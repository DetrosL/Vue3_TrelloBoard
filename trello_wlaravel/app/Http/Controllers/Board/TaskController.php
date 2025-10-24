<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;

use App\Models\{Attach, Comment, Tag, Step, Task};
use App\Services\TaskService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{    
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function show(string $id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function create()
    {
        return Inertia::render('board/AddEdit');
    }

    public function store(Request $request)
    {
        $data_task = $request->validate([
            'position_id' => 'required|exists:positions,id',
            'creator_id' => 'required|exists:users,id',
            'user_id' => 'exists:users,id',
            'nome' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'dt_start' => 'required|date',
            'dt_end' => 'nullable|date|after_or_equal:dt_start',
            // steps
            'steps_task' => 'sometimes|array',
            'steps_task.*.user_id' => 'required|integer|max:11',
            'steps_task.*.desc' => 'nullable|string|max:255',
            'steps_task.*.completed' => 'required|boolean',
            // tag
            'tags_task' => 'sometimes|array',
            'tags_task.*.id' => 'nullable|integer|max:11',
        ]);

        $task = Task::create($data_task);

        if (!empty($data_task['steps_task'])) {
            $this->taskService->createStep($task, $data_task['steps_task']);
        }

        if (!empty($data_task['tags_task'])) {
            $this->taskService->createTag($task, $data_task['tags_task']);
        }
    
        print_r($task);

        return response()->json([
            'message' => 'Task created',
            'task' => $task->load(['steps', 'tags']),
        ], 201);
    }

    public function edit(string $id)
    {
        $Task = Task::find($id);
        return Inertia::render('board/AddEdit', [
            'task' => $Task
        ]);
    }

    // steps
    public function store_step(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
            'desc' => 'required|string|max:255',
            'completed' => 'required|boolean',
        ]);

        $step = Step::create($data);
        return response()->json($step, 201);
    }

    // tags
    public function store_tag(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);
        
        $tag = Tag::create($data);
        return response()->json($tag, 201);
    }

    // comments
    public function store_comment(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
            'desc' => 'required|string|max:255',
        ]);

        $comment = Comment::create($data);
        return response()->json($comment, 201);
    }

    // attaches
    public function store_attach(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
            'url' => 'required|string|max:255',
            'qtd' => 'required|integer|max:11',
        ]);

        $attach = Attach::create($data);
        return response()->json($attach, 201);
    }

    public function update(Request $request, string $id)
    {
        $data_task = $request->validate([
            'position_id' => 'nullable|exists:positions,id',
            'user_id' => 'nullable|exists:users,id',
            'nome' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date|after_or_equal:dt_start',
            'steps_task' => 'sometimes|array',
            'steps_task.*.user_id' => 'required|integer|max:11',
            'steps_task.*.desc' => 'nullable|string|max:255',
            'steps_task.*.completed' => 'required|boolean',
            'tags_task' => 'sometimes|array',
            'tags_task.*.id' => 'nullable|integer|max:11',
        ]);

        $task = Task::findOrFail($id);

        // Atualiza campos principais
        $task->update([
            'nome' => $data_task['nome'],
            'desc' => $data_task['desc'] ?? $task->desc,
            'dt_start' => $data_task['dt_start'] ?? $task->dt_start,
            'dt_end' => $data_task['dt_end'] ?? $task->dt_end,
            'position_id' => $data_task['position_id'] ?? $task->position_id,
            'user_id' => $data_task['user_id'] ?? $task->user_id,
        ]);

        if (!empty($data_task['tags_task'])) {
            $this->taskService->updateTag($task, $data_task['tags_task']);
        }

        if (!empty($data_task['steps_task'])) {
            $this->taskService->updateStep($task, $data_task['steps_task']);
        }

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task->load(['tags', 'steps']),
        ], 200);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task successfully deleted'], 200);
    }
}