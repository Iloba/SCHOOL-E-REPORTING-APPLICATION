<?php

use Illuminate\Support\Facades\Route;
//import Controller
use App\Http\Controllers\UploadController;
use App\Http\Controllers\StudentController;

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

//Register Student Route
Route::post('register', [StudentController::class, 'store'])->name('register');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [UploadController::class, 'upload']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
