<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('blog')->name('blog')->group(function () {
        Route::get('/', [BlogController::class, 'get_posts'])->name('');

        Route::name('.')->group(function () {
            # Post
            Route::prefix('posts')->name('posts')->group(function () {
                Route::get('/', [BlogController::class, 'get_posts'])->name('');

                Route::name('.')->group(function () {
                    Route::get('/add', [BlogController::class, 'get_add_post'])->name('add');
                    Route::get('/edit/{id}', [BlogController::class, 'get_edit_post'])->middleware('decrypt:value,id')->name('edit');

                    Route::post('/add', [BlogController::class, 'add_post'])->name('add.post');
                    Route::post('/edit', [BlogController::class, 'edit_post'])->middleware('decrypt:value,id')->name('edit.post');
                    Route::post('/remove', [BlogController::class, 'delete_post'])->middleware('decrypt:value,id')->name('remove.post');
                    Route::post('/remove-undo', [BlogController::class, 'delete_post_undo'])->middleware('decrypt:value,id')->name('remove.undo');
                });
            });

            # Categories
            Route::prefix('categories')->name('categories')->group(function () {
                Route::get('/', [BlogController::class, 'get_categories'])->name('');

                Route::name('.')->group(function () {
                    Route::get('/add', [BlogController::class, 'get_add_category'])->name('add');

                    Route::post('/add', [BlogController::class, 'add_category'])->name('add.post');
                    Route::post('/remove', [BlogController::class, 'delete_category'])->middleware('decrypt:value,id')->name('remove.post');
                    Route::post('/remove-undo', [BlogController::class, 'delete_category_undo'])->middleware('decrypt:value,id')->name('remove.undo');
                });
            });

            # Tags
            Route::prefix('tags')->name('tags')->group(function () {
                Route::get('/', [BlogController::class, 'get_tags'])->name('');

                Route::name('.')->group(function () {
                    Route::get('/add', [BlogController::class, 'get_add_tag'])->name('add');

                    Route::post('/add', [BlogController::class, 'add_tag'])->name('add.post');
                    Route::post('/remove', [BlogController::class, 'delete_tag'])->middleware('decrypt:value,id')->name('remove.post');
                    Route::post('/remove-undo', [BlogController::class, 'delete_tag_undo'])->middleware('decrypt:value,id')->name('remove.undo');
                });
            });
        });
    });
});
