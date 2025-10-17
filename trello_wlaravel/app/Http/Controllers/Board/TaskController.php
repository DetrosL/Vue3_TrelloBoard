<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Task;
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
            'position_id' => 'required|exists:positions,id',
            'nome' => 'required|string|max:255',
            'dt_start' => 'nullable|date',
            'dt_end' => 'nullable|date|after_or_equal:dt_start',
        ]);

        $Task = Task::create($data);
        return response()->json($Task, 201);
        // return redirect()->route('task.index')->with('success', 'successfully created task');
    }

    public function edit(string $id)
    {
        $Task = Task::find($id);
        return Inertia::render('board/AddEdit', [
            'task' => $Task
        ]);
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
        // return redirect()->route('task.index')->with('success', 'Task successfully updated');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task successfully deleted'], 200);
    }
}