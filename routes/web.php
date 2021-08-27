<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return redirect()->to('home');
    // return view('welcome');
});

// Route::view('home', 'home');
Route::get('home', [ArticleController::class, 'index'])->name('home');

Route::get('create-article', [ArticleController::class, 'createArticle'])->name('createArticle');
Route::post('storeArticle', [ArticleController::class, 'storeArticle'])->name('storeArticle');

Route::get('edit-article/{article}', [ArticleController::class, 'editArticle'])->name('edit-article');
Route::put('updateArticle/{article}', [ArticleController::class, 'updateArticle'])->name('updateArticle');
