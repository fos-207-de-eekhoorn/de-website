<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });

Route::namespace('Api')
    ->group(function () {
    	// Activiteiten
    	Route::post(
    		'/activiteiten/set-aanwezig',
    		'AdminController@SetActiviteitAanwezig'
    	);

    	// Activiteiten
    	Route::post(
    		'/evenementen/set-active',
    		'AdminController@SetEvenementActive'
    	);

    	// General
    	Route::post(
    		'/upload-image',
    		'AdminController@UploadImage'
    	);
    });