<?php

use App\Http\Controllers\EvenementenController;
use Illuminate\Support\Facades\Route;

Route::prefix('evenementen')->name('evenementen')->group(function () {
	Route::get('/', [EvenementenController::class, 'get_alle_evenementen'])->name('');

    Route::name('.')->group(function () {
        # Overrides
        Route::get('/startdag', [EvenementenController::class, 'get_event_startdag'])->name('startdag');
        // Route::get('/sneukeltocht', [EvenementenController::class, 'get_event_sneukeltocht']);
        // Route::get('/spaghetti-avond', [EvenementenController::class, 'get_event_spaghetti_avond']);
        // Route::get('/bbq', [EvenementenController::class, 'get_event_bbq']);
        // Route::get('/winterbar', [EvenementenController::class, 'get_event_winterbar']);
        // Route::get('/halloweentocht', [EvenementenController::class, 'get_event_halloweentocht']);
        // Route::get('/eikeltjesquiz', [EvenementenController::class, 'get_event_eikeltjesquiz']);
    
        # Bivak
        Route::get('/bivak/bevers-welpen', [EvenementenController::class, 'get_bivak_bevers_welpen']);
        Route::get('/bivak/jonge', [EvenementenController::class, 'get_bivak_jonge']);
        Route::get('/bivak/oude', [EvenementenController::class, 'get_bivak_oude']);
    
        # Kamp
        Route::get('/kamp', [EvenementenController::class, 'get_kamp'])->name('kamp');
        Route::get('/kamp/{year}', [EvenementenController::class, 'get_kamp']);
    
        # Default
        Route::get('/{evenement:url}', [EvenementenController::class, 'get_evenement_details'])->name('details');
    });
});