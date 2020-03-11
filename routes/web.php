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

# Authentication Routes
Auth::routes(['register' => false]);
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/change-password', 'ChangePasswordController@showChangePasswordForm');
Route::post('/change-password', 'ChangePasswordController@changePassword');

# General Routes
Route::get('/', 'HomeController@get_home');
Route::get('/contact', 'HomeController@get_contact');

Route::post('/contact/zend-bericht', 'HomeController@post_contact_message');

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

# Evenementen Routes
Route::get('/evenementen', 'EvenementenController@get_alle_evenementen');
Route::get('/evenementen/startdag', 'EvenementenController@get_event_startdag');
Route::get('/evenementen/sneukeltocht', 'EvenementenController@get_event_sneukeltocht');
Route::get('/evenementen/spaghetti-avond', 'EvenementenController@get_event_spaghetti_avond');
Route::get('/evenementen/bbq', 'EvenementenController@get_event_bbq');
Route::get('/evenementen/winterbar', 'EvenementenController@get_event_winterbar');
Route::get('/evenementen/halloweentocht', 'EvenementenController@get_event_halloweentocht');
Route::get('/evenementen/eikeltjesquiz', 'EvenementenController@get_event_eikeltjesquiz');
	# Bivak
	Route::get('/evenementen/bivak/bevers-welpen', 'EvenementenController@get_bivak_bevers_welpen');
	Route::get('/evenementen/bivak/jonge', 'EvenementenController@get_bivak_jonge');
	Route::get('/evenementen/bivak/oude', 'EvenementenController@get_bivak_oude');

# Documenten Routes
