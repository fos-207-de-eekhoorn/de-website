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

# Takken Routes
Route::get('/takken', 'TakkenController@get_takken');
Route::get('/takken/{tak}', 'TakkenController@get_tak_details');
