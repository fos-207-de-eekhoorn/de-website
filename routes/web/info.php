<?php

use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

Route::prefix('alle-info')->name('info')->group(function () {
    Route::get('/', [InfoController::class, 'get_alle_info'])->name('');

    Route::name('.')->group(function () {
        Route::get('/lid-worden', [InfoController::class, 'get_lid_worden'])->name('lid-worden');
        Route::get('/uniform-shop', [InfoController::class, 'get_uniform_shop'])->name('uniform');
        Route::get('/verhuurlijst', [InfoController::class, 'get_verhuurlijst'])->name('verhuurlijst');
        Route::get('/documenten', [InfoController::class, 'get_docs'])->name('documenten');
        Route::get('/kost-scouts', [InfoController::class, 'get_kost_scouts'])->name('kost');
        Route::get('/trooper', [InfoController::class, 'get_trooper'])->name('trooper');
        Route::get('/jeugdwerkregels', [InfoController::class, 'get_jeugdwerkregels'])->name('jeugdwerkregels');
        Route::get('/inschrijven', [InfoController::class, 'get_inschrijven'])->name('inschrijven');
        Route::post('/inschrijven', [InfoController::class, 'post_inschrijven'])->name('inschrijven.post');
    });
});
