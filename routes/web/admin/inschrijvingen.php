<?php

use App\Http\Controllers\Admin\InschrijvingenController;
use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {
    Route::prefix('inschrijvingen')->name('inschrijvingen')->group(function () {
        Route::get('/', [InschrijvingenController::class, 'get_inschrijvingen'])->name('');

        Route::name('.')->group(function () {
            Route::get('/export', [InschrijvingenController::class, 'export_inschrijvingen'])->name('export');
            Route::get('/export/{format}', [InschrijvingenController::class, 'export_inschrijvingen'])->name('export');
        });
    });
});
