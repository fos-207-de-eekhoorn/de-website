<?php

use App\Http\Controllers\Admin\ActiviteitenController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('activiteiten')->name('activiteiten')->group(function () {
        Route::get('/', [ActiviteitenController::class, 'get_activiteiten'])->name('');

        Route::name('.')->group(function () {
            Route::get('/{tak:slug}', [ActiviteitenController::class, 'get_activiteiten_tak'])->name('tak');
            Route::get('/add/{tak:slug}', [ActiviteitenController::class, 'get_add_activiteit'])->name('add');
            Route::get('/edit/{id}', [ActiviteitenController::class, 'get_edit_activiteit'])->name('edit');
            Route::get('/{tak:slug}/inschrijvingen', [ActiviteitenController::class, 'get_activiteiten_tak_inschrijvingen'])->name('next_inschrijvingen');
            Route::get('/inschrijvingen/{activiteit_id}', [ActiviteitenController::class, 'get_activiteit_inschrijvingen'])->name('inschrijvingen');

            Route::post('/add', [ActiviteitenController::class, 'post_add_activiteit'])->middleware('decrypt:value,tak')->name('add.post');
            Route::post('/edit', [ActiviteitenController::class, 'post_edit_activiteit'])->middleware('decrypt:value,id')->name('edit.post');
            Route::post('/remove', [ActiviteitenController::class, 'delete_activiteit'])->middleware('decrypt:value,id')->name('remove.post');
            Route::post('/remove-undo', [ActiviteitenController::class, 'delete_activiteit_undo'])->middleware('decrypt:value,id')->name('remove.undo');
            Route::post('/inschrijvingen/remove', [ActiviteitenController::class, 'delete_activiteit_inschrijvingen'])->middleware('decrypt:value,id')->name('inschrijvingen.remove.post');
            Route::post('/inschrijvingen/remove-undo', [ActiviteitenController::class, 'delete_activiteit_inschrijvingen_undo'])->middleware('decrypt:value,id')->name('inschrijvingen.remove.undo');
        });
    });
});
