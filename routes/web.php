<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => [], 'prefix' => 'users'], function () {
    Route::controller(UserController::class)->group(function() {
        Route::get('all', 'getUsers')->name('users.all');
        Route::post('create', 'createUpdateUser');
    });
});


