<?php

use App\Http\Controllers\TakkenController;
use Illuminate\Support\Facades\Route;

Route::prefix('takken')->name('takken')->group(function () {
    Route::get('/', [TakkenController::class, 'get_takken'])->name('');
    
    Route::name('.')->group(function () {
        Route::get('/{tak:slug}', [TakkenController::class, 'get_tak_details'])->name('details');
        Route::get('/inschrijven/{inschrijving:id}', [TakkenController::class, 'get_tak_inschrijven'])->name('inschrijven');
        Route::post('/inschrijven', [TakkenController::class, 'post_tak_inschrijven'])->middleware('decrypt:value,activiteit_id')->name('inschrijven.post');
    });
});
