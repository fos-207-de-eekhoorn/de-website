<?php

use App\Http\Controllers\Admin\GeneralController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin')->middleware(['auth'])->group(function () {
	Route::get('/', [GeneralController::class, 'get_admin'])->name('');

	$base_route = __DIR__.'/admin';

	// # Activiteiten
	require $base_route.'/activiteiten.php';

	// # Evenementen
	require $base_route.'/evenementen.php';

	// # Inschrijvingen
	require $base_route.'/inschrijvingen.php';

	// # Blog
	require $base_route.'/blog.php';

	// # Content
	require $base_route.'/content.php';

	// # Settings
	require $base_route.'/settings.php';
});
