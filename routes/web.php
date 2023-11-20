<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

Route::get('/', function () {
    return view('home');
})->name('home');


// ==============================Translate all pages============================
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {
    // ==============================dashboard============================
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace' => 'Users'], function () {
        Route::resource('users', 'UserController');
    });

    Route::group(['namespace' => 'Jobs'], function () {
        Route::resource('jobs', 'JobController');
        Route::get('/available-jobs', 'JobController@availableJobs')->name('jobs.available');
    });

    Route::group(['namespace' => 'Applications'], function () {
        Route::resource('applications', 'ApplicationController');
        Route::get('/create/{id}', 'ApplicationController@create')->name('applications.create');
    });
});
