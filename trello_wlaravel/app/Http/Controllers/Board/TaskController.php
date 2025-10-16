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
    public function show(Request $request):Response
    {
        
        return response()->view('');
    }

    public function create(Request $request):Response
    {
        
        return response()->view('board/AddEdit');
    }

    public function edit(Request $request):Response
    {
        
        return response()->view('board/AddEdit');
    }

    // public function edit(Request $request): Response
    // {
    //     return Inertia::render('board/AddEdit');
    // }
    // public function update(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user()->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request):Response
    {
        //
        return response()->view('');
    }
}