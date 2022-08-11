<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Backend\Admin\AppearanceController;
use App\Http\Controllers\Backend\Admin\JobPostController as AdminJobPostController;
use App\Http\Controllers\Backend\Admin\CategoryCotronller;
use App\Http\Controllers\Backend\Admin\SettingController;
use App\Http\Controllers\Frontend\JobPostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ====================Backend all Route==========================//
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    //------------------ Dashboard ---------------------//
    Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/student',[StudentController::class, 'studentIndex'])
    ->name('student.index');
    Route::post('/student/store',[StudentController::class, 'studentStore'])->name('student.store');
    Route::resource('/user', UserController::class)->except('show');
    Route::resource('/cetagory',CategoryCotronller::class)->except('show');
    Route::resource('/job-post',AdminJobPostController::class)->except('show','create','store');

});
