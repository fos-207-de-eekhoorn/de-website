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
    		'AdminController@PostSetAanwezig'
    	);

        // Uploads
        Route::get(
            '/signed-upload-url',
            'ImageUploadController@getSignedImageUploadUrl'
        );
        Route::post(
            '/complete-upload',
            'ImageUploadController@postCompleteImageUpload'
        );
    });
