<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => [], 'prefix' => 'member'], function () {
    Route::controller(MemberController::class)->group(function() {
        Route::get('get-member', 'getMembers');
        Route::post('create', 'createMember');
    });
});
