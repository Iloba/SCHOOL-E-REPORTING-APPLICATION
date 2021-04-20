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


Route::get('/', function () {
    return view('welcome');
});


//Register Student Route
Route::post('/home/register', [StudentController::class, 'store'])->name('register_student');

//List of All Students
Route::get('/home/students', [StudentController::class, 'index'])->name('students_list');

//Get All Students Profile
Route::get('/home/students/{id}', [StudentController::class, 'show'])->name('students_profile');

//Edit Student
Route::get('/home/students/{id}/edit', [StudentController::class, 'edit'])->name('edit');

Route::post('/upload', [UploadController::class, 'upload']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


