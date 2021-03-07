<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::prefix('blog')->name('blog')->group(function () {
    Route::get('/', [BlogController::class, 'get_blog'])->name('');

    Route::name('.')->group(function () {
        Route::get('/{blog_post:slug}', [BlogController::class, 'get_blog_post'])->name('post');
    });
});
