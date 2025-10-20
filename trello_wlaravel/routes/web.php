<?php

use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\PositionController;
use App\Http\Controllers\Board\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
    //login, register
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('board')->group(function () {
        Route::get('/list', [BoardController::class, 'list'])->name('board');
        Route::get('/', [BoardController::class, 'index'])->name('board.index');
        Route::get('/create', [BoardController::class, 'create'])->name('position.create');
        Route::post('/', [BoardController::class, 'store'])->name('position.store');
        // Route::get('/{id}', [PositionController::class, 'show'])->name('position.show');
        // Route::get('/edit/{id}', [PositionController::class, 'edit'])->name('position.edit'); // pattern REST: /{id}/edit
        // Route::patch('/{id}', [PositionController::class, 'update'])->name('position.update');
        Route::delete('/{id}', [BoardController::class, 'destroy'])->name('position.destroy');
    });

    Route::prefix('task')->group(function () {
        Route::get('/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/', [TaskController::class, 'store'])->name('task.store');
        Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit'); // pattern REST: /{id}/edit
        Route::patch('/{id}', [TaskController::class, 'update'])->name('task.update');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
