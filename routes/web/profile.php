<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('profile')->name('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'get_profile'])->name('');

    Route::name('.')->group(function () {
        Route::get('/edit', [ProfileController::class, 'get_edit'])->name('edit');

        Route::post('/edit', [ProfileController::class, 'post_edit'])->name('edit.post');
    });
});
