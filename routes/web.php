<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

$base_route = __DIR__.'/web';

# General Routes
Route::get('/', [HomeController::class, 'get_home'])->name('home');
Route::get('/contact', [HomeController::class, 'get_contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'post_contact']);

# Takken Routes
require $base_route.'/takken.php';

# Algemene info Routes
require $base_route.'/info.php';

# Evenementen Routes
require $base_route.'/evenementen.php';

# Admin Routes
require $base_route.'/admin.php';

# Blog Routes
require $base_route.'/blog.php';

# Auth Routes
require $base_route.'/auth.php';
