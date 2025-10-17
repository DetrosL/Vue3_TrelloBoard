<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Inertia\Inertia;
// Route::get('/user/{id}', [UserController::class, 'show']);

class BoardController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Inertia::render('Board');\
        $Board = Board::find('1');
        $Positions = Position::all();
        return Inertia::render('Board', [
            'title' => $Board->get('title'), 
            'positions' => $Positions
        ]);
        // return response()->json($Board);
    }

    public function index()
    {
        $Board = Board::find(1);

        if (!$Board) {
            return Inertia::render('Board', [
                'title' => 'Board not found',
                'positions' => [],
            ]);
        }

        $Positions = Position::where('board_id', 1)->get();

        // Retorna para o componente Inertia "Board"
        return Inertia::render('Board', [
            'title' => $Board->title,
            'positions' => $Positions,
        ]);
    }

}