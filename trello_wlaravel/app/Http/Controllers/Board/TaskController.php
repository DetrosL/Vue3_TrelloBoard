<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;

use App\Models\{Attach, Comment, Step, Task};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Illuminate\View\View;

class TaskController extends Controller
{    
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
        $data = $request->validate([
            'position_id' => 'required|exists:positions,id', //smp na primeira posição?
            'creator_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id',
            'nome' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'dt_start' => 'required|date',
            'dt_end' => 'nullable|date|after_or_equal:dt_start',
        ]);

        $task = Task::create($data);
        return response()->json($task, 201);
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
            'qtd' => 'required|int|max:11',
        ]);

        $attach = Attach::create($data);
        return response()->json($attach, 201);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date|after_or_equal:dt_start',
        ]);

        $Task = Task::findOrFail($id);
        $Task->update($data);
        return response()->json($Task, 201);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task successfully deleted'], 200);
    }
}