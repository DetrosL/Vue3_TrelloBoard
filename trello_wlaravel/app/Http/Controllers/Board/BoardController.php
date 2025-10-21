<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\{User, Position, Board, Task};

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Inertia\Inertia;
// Route::get('/user/{id}', [UserController::class, 'show']);

class BoardController extends Controller
{   
    public function index(Request $request)
    {
        //$user = User::find(1); // <- pq to logada no user errado
        $user = $request->user();
        
        $board = $user->boards()->with('positions.tasks', 'positions.tasks.steps', 'positions.tasks.tags', 'positions.tasks.attaches', 'positions.tasks.comments')->get()->first();
        
        if (!$board) {
            return Inertia::render('Board', [
                'title' => 'Board not found',
                'positions' => [],
                'tasks' => [],
            ]);
        }

        return Inertia::render('Board', [
                'title' => $board->title,
                'positions' => $board->positions->toArray(),
                'tasks' => $board->positions->flatMap->tasks->toArray(),
            ]);
    }

    public function create()
    {
        return Inertia::render('board/AddPosition'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'board_id' => 'required|exists:boards,id',
            'cod' => 'required|integer|max:11',
            'desc' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $position= Position::create($data);
        return response()->json($position, 201);
    }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
    }

    public function list(Request $request){
        $user = $request->user();
        $board = $user->boards()->with('positions.tasks', 'positions.tasks.steps', 'positions.tasks.attaches', 'positions.tasks.comments')->get();
        return response()->json($board);
    }
}