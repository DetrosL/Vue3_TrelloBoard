<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\View\View;
use Inertia\Inertia;

class PositionController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('board/AddPosition'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}