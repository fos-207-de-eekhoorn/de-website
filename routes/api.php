<?php

use App\Http\Controllers\Api\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->name('api')->group(function () {
	Route::name('.')->group(function () {
		// Activiteiten
		Route::post(
			'/activiteiten/set-aanwezig',
			[AdminController::class, 'SetActiviteitAanwezig']
		)->name('activiteiten.set_aanwezig');

		// Evenementen
		Route::post(
			'/evenementen/set-active',
			[AdminController::class, 'SetEvenementActive']
		)->name('evenementen.set_active');

		// Evenementen
		Route::post(
			'/blog/posts/set-active',
			[AdminController::class, 'SetBlogPostActive']
		)->name('blog.set_active');

		// General
		Route::post(
			'/upload-image',
			[AdminController::class, 'UploadImage']
		)->name('upload_image');
	});
});
