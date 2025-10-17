<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Client\Request;
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

    
}