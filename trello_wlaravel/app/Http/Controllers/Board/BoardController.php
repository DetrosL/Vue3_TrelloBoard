<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Position;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Inertia\Inertia;
// Route::get('/user/{id}', [UserController::class, 'show']);

class BoardController extends Controller
{   public function index(Request $request)
    {
        $user = $request->user();
        $Board = $user->boards()->with('positions.tasks')->get();
        if (!$Board) {
            return Inertia::render('Board', [
                'title' => 'Board not found',
                'positions' => [],
                'tasks' => [],
            ]);
        }

        return Inertia::render('Board', [
            'Board' => $Board
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

    // public function edit(string $id)
    // {
    //     return Inertia::render('board/EditPosition', [
    //         'position' => $position,
    //     ]);
    // }

    // public function update(Request $request, string $id)
    // {
    //     $data = $request->validate([
    //         'cod' => 'required|int|max:11',
    //         'desc' => 'nullable|string',
    //         'status' => 'required|string',
    //     ]);

    //     $position = Position::findOrFail($id);
    //     $position->update($data);
    //     return response()->json($position, 201);
    //     return redirect()->route('position.index')->with('success', 'Position successfully updated');
    // }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return redirect()->route('position.index')->with('success', 'Position successfully deleted');
    }
}