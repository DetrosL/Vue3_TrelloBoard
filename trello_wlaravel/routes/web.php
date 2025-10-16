<?php

use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::middleware('auth')->prefix('board')->group(function () {
    Route::redirect('board', '/');
    
    Route::get('/', [BoardController::class, 'index'])->name('board.index');
    Route::get('/{id}', [BoardController::class, 'show']);
    
    Route::get('/task', [TaskController::class, 'create'])->name('task.create');
    Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});

// Route::get('board', function () {
//     $board = \App\Models\Board::all();
//     $position = \App\Models\Position::all();
//     return Inertia::render('Board', [
//                 'board' => $board,
//                 'position' => $position,
//             ]);
// })->name('board');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //middleware (algo q tem q ser feito antes de acessar a rota)

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
