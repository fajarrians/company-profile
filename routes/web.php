<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfilController;
use Illuminate\Routing\ViewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\ViewController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('home', HomeController::class)->middleware('auth:sanctum');
Route::resource('profil', ProfilController::class)->middleware('auth:sanctum');
Route::resource('portfolio', PortfolioController::class)->middleware('auth:sanctum');
Route::resource('blog', BlogController::class)->middleware('auth:sanctum');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);
Route::resource('gallery', GalleryController::class)->middleware('auth:sanctum');