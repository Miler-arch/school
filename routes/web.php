<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalificationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrimesterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UserController::class)->names('users');
    Route::post('update-status', [UserController::class, 'updateStatus'])->name('users.update.status');

    Route::resource('students', StudentController::class)->names('students');
    Route::resource('teachers', TeacherController::class)->names('teachers');

    Route::resource('courses', CourseController::class)->names('courses');
    Route::resource('courses_settings', CourseSettingController::class)->names('courses_settings');

    Route::resource('trimesters', TrimesterController::class)->names('trimesters');

    Route::resource('califications', CalificationController::class)->names('califications');

    Route::resource('subjects', SubjectController::class)->names('subjects');

    Route::get('califications/notes/{year}', [CalificationController::class, 'indexCalifications'])->name('califications.notes');
    Route::get('califications/notes/get-notes', [CalificationController::class, 'getNotes'])->name('califications.getNotes');
    Route::post('califications/notes/save-notes', [CalificationController::class, 'saveNotes'])->name('califications.saveNotes');
});
