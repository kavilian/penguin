<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('/', function () {
    return view('index');
});

//user related routes
Route::prefix('user')->middleware('auth', 'verified')->name('user.')->group(function() {
    Route::get('profile', ProfileController::class)->name('profile');
});

//Admin routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function() {
    Route::resource('/users', UserController::class);
});

