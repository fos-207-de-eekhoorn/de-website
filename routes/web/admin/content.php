<?php

use App\Http\Controllers\Admin\ContentController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('contents')->name('contents')->group(function () {
        Route::get('/', [ContentController::class, 'get_contents'])->name('');

        Route::name('.')->group(function () {
            Route::get('/{content:key}', [ContentController::class, 'get_content_key'])->name('key');

            Route::post('/add', [ContentController::class, 'post_add_content_text'])->middleware(['decrypt:value,id', 'decrypt:value,user_id'])->name('add.post');
        });
    });
});
