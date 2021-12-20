<?php

use App\Http\Controllers\OCRController;
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
    return view('upload');
});

Route::get('/testAPI', [OCRController::class, 'uploadImage']);
Route::post('/upload-image', [OCRController::class, 'uploadFile'])->name('upload-file');
Route::get('/fuzzy-match', [OCRController::class, 'showFuzzyMatch'])->name('show-fuzzt-match');
Route::post('/search-keyword', [OCRController::class, 'searchKeyword'])->name('search-keyword');
