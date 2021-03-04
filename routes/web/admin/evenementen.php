<?php

use App\Http\Controllers\Admin\EvenementenController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('evenementen')->name('evenementen')->group(function () {
        Route::get('/', [EvenementenController::class, 'get_evenementen'])->name('');

        Route::name('.')->group(function () {
            Route::get('/add', [EvenementenController::class, 'get_add_evenementen'])->name('add');
            Route::get('/edit/{id}', [EvenementenController::class, 'get_edit_evenementen'])->name('edit');

            Route::post('/add', [EvenementenController::class, 'post_add_evenementen'])->name('add.post');
            Route::post('/edit', [EvenementenController::class, 'post_edit_evenementen'])->middleware('decrypt:value,id')->name('edit.post');
            Route::post('/remove', [EvenementenController::class, 'delete_activiteit'])->middleware('decrypt:value,id')->name('remove.post');
            Route::post('/remove-undo', [EvenementenController::class, 'delete_activiteit_undo'])->middleware('decrypt:value,id')->name('remove.undo');
        });
    });
});
