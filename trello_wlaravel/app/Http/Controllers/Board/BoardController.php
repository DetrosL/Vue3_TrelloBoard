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
        $user = User::find(1); // <- pq to logada no user errado
        // $user = $request->user();
        
        $board = $user->boards()->with('positions.tasks', 'positions.task.steps', 'positions.task.attaches', 'positions.task.comments')->get()->first();
        
        if (!$board) {
            return Inertia::render('Board', [
                'title' => 'Board not found',
                'positions' => [],
                'tasks' => [],
            ]);
        }

        // return Inertia::render('Board', [
        //     'Board' => $Board
        // ]);
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
            'cod' => 'required|int|max:11',
            'desc' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $Position= Position::create($data);
        return response()->json($Position, 201);
        // return redirect()->route('board.index')->with('success', 'successfully created position');
    }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return redirect()->route('position.index')->with('success', 'Position successfully deleted');
    }
    public function list(Request $request){
        $user = $request->user();
        $board = $user->boards()->with('positions.tasks')->get();
        // dd($board);
        return response()->json($board);
    }
}