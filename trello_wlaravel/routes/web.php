<?php

use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\PositionController;
use App\Http\Controllers\Board\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/board', [BoardController::class, 'index'])->name('board.index');
    
    Route::prefix('position')->group(function () {
        Route::get('/', [PositionController::class, 'index'])->name('position.index');
        Route::get('/create', [PositionController::class, 'create'])->name('position.create');
        Route::post('/', [PositionController::class, 'store'])->name('position.store');
        Route::get('/{id}', [PositionController::class, 'show'])->name('position.show');
        Route::get('/edit/{id}', [PositionController::class, 'edit'])->name('position.edit'); // pattern REST: /{id}/edit
        Route::patch('/{id}', [PositionController::class, 'update'])->name('position.update');
        Route::delete('/{id}', [PositionController::class, 'destroy'])->name('position.destroy');
    });

    Route::prefix('task')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('task.index');
        Route::get('/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/', [TaskController::class, 'store'])->name('task.store');
        Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit'); // pattern REST: /{id}/edit
        Route::patch('/{id}', [TaskController::class, 'update'])->name('task.update');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    });
});

Route::get('board', function () {
    return Inertia::render('Board');
})->middleware(['auth', 'verified'])->name('board'); //middleware (algo q tem q ser feito antes de acessar a rota)

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
