<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalStudents = \App\Models\Student::count();
    $totalCourses = \App\Models\Course::count();
    $totalEnrollments = \App\Models\Enrollment::count();
    $activeStudents = \App\Models\Student::where('status', 'active')->count();
    
    return view('dashboard', compact('totalStudents', 'totalCourses', 'totalEnrollments', 'activeStudents'));
})->name('dashboard');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('enrollments', EnrollmentController::class);
