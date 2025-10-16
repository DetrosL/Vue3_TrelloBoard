<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
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
        return Inertia::render('Board', [
            'title' => $Board->get('title'), //??
        ]);
        // return response()->json($Board);
    }
    /**
     * Display the specified resource.
     */
    public function show (Request $request):Response
    {
        return response()->view('board/AddPosition');
    }
}