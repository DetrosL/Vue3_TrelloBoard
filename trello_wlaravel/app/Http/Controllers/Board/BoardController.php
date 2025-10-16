<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
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
        //
        return Inertia::render('Board'); 
        // , [
        //     'boards' => Board::with('positions')->get()
        // ]
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //
    }
}