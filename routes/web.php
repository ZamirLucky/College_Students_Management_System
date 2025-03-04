<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

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

// route that will return a list of students
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// route that will allow a user to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// route that will store the details of the new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// route that will show the contents of a specific student
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
