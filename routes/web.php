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
Route::post('/contact', 'HomeController@post_contact');

# Takken Routes
Route::prefix('takken')->group(function () {
	Route::get('/', 'TakkenController@get_takken');
	Route::get('/{tak}', 'TakkenController@get_tak_details');
	Route::get('/inschrijven/{id}', 'TakkenController@get_tak_inschrijven');
	Route::post('/inschrijven', 'TakkenController@post_tak_inschrijven')->middleware('decrypt:value,activiteit_id');
});

# Algemene info Routes
Route::prefix('alle-info')->group(function () {
	Route::get('/', 'InfoController@get_alle_info');
	Route::get('/lid-worden', 'InfoController@get_lid_worden');
	Route::get('/uniform-shop', 'InfoController@get_uniform_shop');
	Route::get('/verhuurlijst', 'InfoController@get_verhuurlijst');
	Route::get('/documenten', 'InfoController@get_docs');
	Route::get('/kost-scouts', 'InfoController@get_kost_scouts');
	Route::get('/trooper', 'InfoController@get_trooper');
	Route::get('/jeugdwerkregels', 'InfoController@get_jeugdwerkregels');
	Route::get('/inschrijven', 'InfoController@get_inschrijven');
	Route::post('/inschrijven', 'InfoController@post_inschrijven');
});

# Evenementen Routes
Route::prefix('evenementen')->group(function () {
	Route::get('/', 'EvenementenController@get_alle_evenementen');

	# Overrides
	Route::get('/startdag', 'EvenementenController@get_event_startdag');
	Route::get('/sneukeltocht', 'EvenementenController@get_event_sneukeltocht');
	Route::get('/spaghetti-avond', 'EvenementenController@get_event_spaghetti_avond');
	Route::get('/bbq', 'EvenementenController@get_event_bbq');
	Route::get('/winterbar', 'EvenementenController@get_event_winterbar');
	// Route::get('/halloweentocht', 'EvenementenController@get_event_halloweentocht');
	Route::get('/eikeltjesquiz', 'EvenementenController@get_event_eikeltjesquiz');

	# Bivak
	Route::get('/bivak/bevers-welpen', 'EvenementenController@get_bivak_bevers_welpen');
	Route::get('/bivak/jonge', 'EvenementenController@get_bivak_jonge');
	Route::get('/bivak/oude', 'EvenementenController@get_bivak_oude');

	# Kamp
	Route::get('/kamp', 'EvenementenController@get_kamp');

	# Default
	Route::get('/{url}', 'EvenementenController@get_evenement_details');
});

# Admin Routes
Route::prefix('admin')->group(function () {
	Route::get('/', 'AdminGeneralController@get_admin');

	# Activiteiten
	Route::prefix('activiteiten')->group(function () {
		Route::get('/', 'AdminActiviteitenController@get_activiteiten');
		Route::get('/{tak}', 'AdminActiviteitenController@get_activiteiten_tak');
		Route::get('/add', 'AdminActiviteitenController@get_add_activiteit');
		Route::get('/add/{tak}', 'AdminActiviteitenController@get_add_activiteit');
		Route::get('/edit/{id}', 'AdminActiviteitenController@get_edit_activiteit');
		Route::get('/{tak}/inschrijvingen', 'AdminActiviteitenController@get_activiteiten_tak_inschrijvingen');
		Route::get('/inschrijvingen/{activiteit_id}', 'AdminActiviteitenController@get_activiteit_inschrijvingen');

		Route::post('/add', 'AdminActiviteitenController@post_add_activiteit')->middleware('decrypt:value,tak');
		Route::post('/edit', 'AdminActiviteitenController@post_edit_activiteit')->middleware('decrypt:value,id');
		Route::post('/remove', 'AdminActiviteitenController@delete_activiteit')->middleware('decrypt:value,id');
		Route::post('/remove-undo', 'AdminActiviteitenController@delete_activiteit_undo')->middleware('decrypt:value,id');
		Route::post('/inschrijvingen/remove', 'AdminActiviteitenController@delete_activiteit_inschrijvingen')->middleware('decrypt:value,id');
		Route::post('/inschrijvingen/remove-undo', 'AdminActiviteitenController@delete_activiteit_inschrijvingen_undo')->middleware('decrypt:value,id');

		Route::post('/set-aanwezig', 'ApiAdminController@PostSetActiviteitAanwezig');
	});

	# Inschrijvingen
	Route::prefix('inschrijvingen')->group(function () {
		Route::get('/', 'AdminInschrijvingenController@get_inschrijvingen');
		Route::get('/export', 'AdminInschrijvingenController@export_inschrijvingen');
		Route::get('/export/{format}', 'AdminInschrijvingenController@export_inschrijvingen');
	});

	# Contents
	Route::prefix('contents')->group(function () {
		Route::get('/', 'AdminContentController@get_contents');
		Route::get('/{key}', 'AdminContentController@get_content_key');

		Route::post('/add', 'AdminContentController@post_add_content_text')->middleware(['decrypt:value,id', 'decrypt:value,leider_id']);
	});

	# Evenementen
	Route::prefix('evenementen')->group(function () {
		Route::get('/', 'AdminEvenementenController@get_evenementen');
		Route::get('/add', 'AdminEvenementenController@get_add_evenementen');
		Route::get('/edit/{id}', 'AdminEvenementenController@get_edit_evenementen');

		Route::post('/add', 'AdminEvenementenController@post_add_evenementen');
		Route::post('/edit', 'AdminEvenementenController@post_edit_evenementen')->middleware('decrypt:value,id');
		Route::post('/remove', 'AdminEvenementenController@delete_activiteit')->middleware('decrypt:value,id');
		Route::post('/remove-undo', 'AdminEvenementenController@delete_activiteit_undo')->middleware('decrypt:value,id');

		Route::post('/set-active', 'ApiAdminController@PostSetEvenementActive');
	});

	# Settings
	Route::prefix('settings')->group(function () {
		Route::get('/', 'AdminSettingsController@get_settings');
	});
});	
