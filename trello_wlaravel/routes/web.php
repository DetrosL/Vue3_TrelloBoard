<?php

use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\PositionController;
use App\Http\Controllers\Board\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware('auth')->prefix('board')->group(function () {
    Route::redirect('board', '/');
    
    // Route::get('/', [BoardController::class, 'index'])->name('board.index');
    // Route::get('/{id}', [BoardController::class, 'show']);
    
    Route::get('/position', [PositionController::class, 'index'])->name('position.index');
    Route::get('/position/create', [PositionController::class, 'create'])->name('position.create');
    Route::get('/position/{id}', [PositionController::class, 'edit'])->name('position.edit');
    Route::patch('/position/{id}', [PositionController::class, 'update'])->name('position.update');
    Route::delete('/position/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
    
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});

Route::get('board', function () {
    return Inertia::render('Board');
})->middleware(['auth', 'verified'])->name('board'); //middleware (algo q tem q ser feito antes de acessar a rota)

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
