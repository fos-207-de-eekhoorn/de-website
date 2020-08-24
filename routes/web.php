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
Route::get('/inschrijven', 'HomeController@get_inschrijven');
Route::post('/contact', 'HomeController@post_contact');
Route::post('/inschrijven', 'HomeController@post_inschrijven');

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
	# Kamp
	Route::get('/evenementen/kamp', 'EvenementenController@get_kamp');

# Admin Routes
Route::get('/admin/activiteiten', 'AdminController@get_activiteiten');
Route::get('/admin/activiteiten/prutske', 'AdminController@get_for_prutske');
Route::get('/admin/activiteiten/{tak}', 'AdminController@get_activiteiten_tak');
Route::get('/admin/activiteit/add/', 'AdminController@get_add_activiteit');
Route::get('/admin/activiteit/add/{tak}', 'AdminController@get_add_activiteit');
Route::get('/admin/activiteit/edit/{id}', 'AdminController@get_edit_activiteit');

Route::post('/admin/activiteit/add', 'AdminController@post_add_activiteit')->middleware('decrypt:value,tak');
Route::post('/admin/activiteit/edit', 'AdminController@post_edit_activiteit')->middleware('decrypt:value,id');
Route::post('/admin/activiteit/remove', 'AdminController@delete_activiteit')->middleware('decrypt:value,id');
Route::post('/admin/activiteit/remove-undo', 'AdminController@delete_activiteit_undo')->middleware('decrypt:value,id');

Route::get('/admin/inschrijvingen', 'AdminGeneralController@get_inschrijvingen');
