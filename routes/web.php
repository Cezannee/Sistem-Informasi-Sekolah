<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);

use App\Http\Controllers\TeacherController;

Route::resource('teachers', TeacherController::class);

use App\Http\Controllers\ClassRoomController;

Route::resource('classes', ClassRoomController::class)->parameters([
    'classes' => 'classRoom',
]);

use App\Http\Controllers\SubjectController;

Route::resource('subjects', SubjectController::class);

use App\Http\Controllers\GradeController;

Route::resource('grades', GradeController::class)->only([
    'index','create','store','edit','update','destroy','show'
]);
