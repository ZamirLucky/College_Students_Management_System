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
    return redirect()->route('students.index');
});

// route that will return a list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// route that will allow a user to create a new student
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// route that will store the details of the new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// route that will show the contents of a specific student
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// route that will displays the edit form
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// route that will processes the form submission
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

// route that will delete a student
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

// route that will return a list of colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');

// route that will allow a user to create a new college
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');

// Route that will store the details of the new college
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');

// Route that will delete a student 
Route::delete('/colleges/{college}', [CollegeController::class, 'destroy'])->name('colleges.destroy');