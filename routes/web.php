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
Route::prefix('takken')->group(function () {
	Route::get('/', 'TakkenController@get_takken');
	Route::get('/{tak}', 'TakkenController@get_tak_details');
});

# Algemene info Routes
Route::prefix('alle-info')->group(function () {
	Route::get('/', 'InfoController@get_alle_info');
	Route::get('/lid-worden', 'InfoController@get_lid_worden');
	Route::get('/uniform-shop', 'InfoController@get_uniform_shop');
	Route::get('/verhuurlijst', 'InfoController@get_verhuurlijst');
	Route::get('/docs', 'InfoController@get_docs');
	Route::get('/kost-scouts', 'InfoController@get_kost_scouts');
	Route::get('/trooper', 'InfoController@get_trooper');
});

# Evenementen Routes
Route::prefix('evenementen')->group(function () {
	Route::get('/', 'EvenementenController@get_alle_evenementen');
	Route::get('/{evenement}', 'EvenementenController@get_evenement_details');

	# Overrides
	Route::get('/startdag', 'EvenementenController@get_event_startdag');
	Route::get('/sneukeltocht', 'EvenementenController@get_event_sneukeltocht');
	Route::get('/spaghetti-avond', 'EvenementenController@get_event_spaghetti_avond');
	Route::get('/bbq', 'EvenementenController@get_event_bbq');
	Route::get('/winterbar', 'EvenementenController@get_event_winterbar');
	Route::get('/halloweentocht', 'EvenementenController@get_event_halloweentocht');
	Route::get('/eikeltjesquiz', 'EvenementenController@get_event_eikeltjesquiz');

	# Bivak
	Route::get('/bivak/bevers-welpen', 'EvenementenController@get_bivak_bevers_welpen');
	Route::get('/bivak/jonge', 'EvenementenController@get_bivak_jonge');
	Route::get('/bivak/oude', 'EvenementenController@get_bivak_oude');

	# Kamp
	Route::get('/kamp', 'EvenementenController@get_kamp');
});

# Admin Routes
Route::prefix('admin')->group(function () {
	# Activiteiten
	Route::prefix('activiteiten')->group(function () {
		Route::get('/', 'AdminActiviteitenController@get_activiteiten');
		Route::get('/prutske', 'AdminActiviteitenController@get_for_prutske');
		Route::get('/{tak}', 'AdminActiviteitenController@get_activiteiten_tak');
		Route::get('/add/', 'AdminActiviteitenController@get_add_activiteit');
		Route::get('/add/{tak}', 'AdminActiviteitenController@get_add_activiteit');
		Route::get('/edit/{id}', 'AdminActiviteitenController@get_edit_activiteit');
		Route::post('/add', 'AdminActiviteitenController@post_add_activiteit')->middleware('decrypt:value,tak');
		Route::post('/edit', 'AdminActiviteitenController@post_edit_activiteit')->middleware('decrypt:value,id');
		Route::post('/remove', 'AdminActiviteitenController@delete_activiteit')->middleware('decrypt:value,id');
		Route::post('/remove-undo', 'AdminActiviteitenController@delete_activiteit_undo')->middleware('decrypt:value,id');
	});
	# Evenementen
	Route::prefix('evenementen')->group(function () {
		Route::get('/', 'AdminEvenementenController@get_evenementen');
	});
});
