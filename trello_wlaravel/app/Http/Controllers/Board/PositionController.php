<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\View\View;
use Inertia\Inertia;

class PositionController extends Controller
{    
    public function index()
    {
        $Positions = Position::all();
        return response()->json($Positions);
    }
    
    public function show(string $id)
    {
        $Position = Position::find($id);
        return response()->json($Position);
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

    // public function edit(Position $position)
    // {
    //     return Inertia::render('board/EditPosition', [
    //         'position' => $position,
    //     ]);
    // }

    // public function update(Request $request, Position $position)
    // {
    //     $data = $request->validate([
    //         'cod' => 'required|int|max:11',
    //         'desc' => 'nullable|string',
    //         'status' => 'required|string',
    //     ]);

    //     $position->update($data);
    //     return response()->json($position, 201);
    //     return redirect()->route('position.index')->with('success', 'Position successfully updated');
    // }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('position.index')->with('success', 'Posição removida.');
    }
}