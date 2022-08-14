<?php

use App\Http\Controllers\Forntend\ContactInfoController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\JobApplyController;
use App\Http\Controllers\Frontend\JobPostController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\Frontend\SubscribeController;

Auth::routes([
    'logout'   => false, // Disable 404
    'register' => false, // Disable 404
]);

//------------------ Auth ------------------//
Route::post('logout',[RegistrationController::class, 'logout'])->name('logout');
//================ Frontend Group namespace(frontend.) ===============//
Route::group(['as'=>'frontend.'], function(){
//----------------- Home Page ------------------//
Route::get('', [HomeController::class, 'indexPage'])->name('home.index');
//--------------------search ------------ -----------//
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/profile', [HomeController::class, 'userProfile'])->name('profile.index');
Route::resource('/job-post', JobPostController::class)->except('show')->middleware('jobPost');
Route::resource('/registration', RegisterController::class)->except('show');
Route::get('/user-login', [LoginController::class, 'userLogin'])->name('login.index');
Route::get('/single-page/{id}', [HomeController::class, 'jobSingle'])->name('single.index');
Route::get('/category-single-page/{id}', [HomeController::class, 'categorySingle'])->name('category.single.index');
Route::get('/job-apply/{id}', [HomeController::class, 'jobApply'])->name('apply.index')->middleware('jobPost');
//-------------------job Apply Controller -----------------------//
Route::resource('/apply-job', JobApplyController::class)->except('show');
});


// cache clear
Route::get('cache/clear', function(){
    return Hash::make('1@Msujonmia');
    Artisan::call('optimize:clear');
    Artisan::call('debugbar:clear');

    return ['status'=>200,'message'=>'Cache Clear'];
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
