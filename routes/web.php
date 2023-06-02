<?php

use App\Http\Controllers\ArticleController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/article/cetak_pdf',[ArticleController::class,'cetak_pdf']);
Route::resource('articles',ArticleController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [MahasiswaController::class, 'find']);

route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index']);
route::get('/nilai/{criteria}', [App\Http\Controllers\MahasiswaController::class, 'showNilai'])->name('mahasiswas.showNilai');
Route::resource('mahasiswas', MahasiswaController::class);