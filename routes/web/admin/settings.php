<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('settings')->name('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'get_settings'])->name('');

        Route::name('.')->group(function () {
            Route::get('/edit/{id}', [SettingsController::class, 'get_edit_settings'])->name('edit');

            Route::post('/edit', [SettingsController::class, 'edit_settings'])->middleware('decrypt:value,id')->name('edit.post');
        });
    });
});
