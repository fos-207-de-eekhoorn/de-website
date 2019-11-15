<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# General Routes
Route::get('/', 'HomeController@get_home');
Route::get('/contact', 'HomeController@get_contact');
Route::get('/privacy', 'HomeController@get_privacy');

# Takken Routes
Route::get('/takken', 'TakkenController@get_takken');
Route::get('/takken/{tak}', 'TakkenController@get_tak_details');

# Algemene info Routes
Route::get('/alle-info', 'InfoController@get_alle_info');
Route::get('/alle-info/lid-worden', 'InfoController@get_lid_worden');
Route::get('/alle-info/uniform-shop', 'InfoController@get_uniform_shop');
Route::get('/alle-info/verhuurlijst', 'InfoController@get_verhuurlijst');
Route::get('/alle-info/docs', 'InfoController@get_docs');
Route::get('/alle-info/kost-scouts', 'InfoController@get_kost_scouts');
Route::get('/alle-info/trooper', 'InfoController@get_trooper');

# Evenementen Routs
Route::get('/evenementen', 'EvenementenController@get_alle_evenementen');
Route::get('/evenementen/startdag', 'EvenementenController@get_event_startdag');
Route::get('/evenementen/sneukeltocht', 'EvenementenController@get_event_sneukeltocht');
Route::get('/evenementen/spaghetti-avond', 'EvenementenController@get_event_spaghetti_avond');
Route::get('/evenementen/bbq', 'EvenementenController@get_event_bbq');
Route::get('/evenementen/winterbar', 'EvenementenController@get_event_winterbar');
Route::get('/evenementen/halloweentocht', 'EvenementenController@get_event_halloweentocht');
Route::get('/evenementen/eikeltjesquiz', 'EvenementenController@get_event_eikeltjesquiz');


# Documenten Routs
