<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['middleware' => [], 'prefix' => 'member'], function () {
    Route::controller(MemberController::class)->group(function() {
        Route::post('create', 'createMember');
    });
});

Route::group(['middleware' => [], 'prefix' => 'region'], function () {
    Route::controller(LocationController::class)->group(function() {
        Route::get('get', 'getRegion');
        Route::get('getAll', 'getRegions');
        Route::post('create', 'createRegion');
        Route::put('update', 'updateRegion');
    });
});

Route::group(['middleware' => [], 'prefix' => 'district'], function () {
    Route::controller(LocationController::class)->group(function() {
        Route::get('get', 'getDistrict');
        Route::get('getAll', 'getDistricts');
        Route::post('create', 'createDistrict');
        Route::put('update', 'updateDistrict');
    });
});

Route::group(['middleware' => [], 'prefix' => 'state'], function () {
    Route::controller(LocationController::class)->group(function() {
        Route::get('get', 'getState');
        Route::get('getAll', 'gateStates');
        Route::post('create', 'createState');
        Route::put('update', 'updatedState');
    });
});

Route::group(['middleware' => [], 'prefix' => 'ward'], function () {
    Route::controller(LocationController::class)->group(function() {
        Route::get('get', 'getWard');
        Route::get('getAll', 'getWards');
        Route::post('create', 'createWard');
        Route::put('update', 'updateWard');
    });
});

Route::group(['middleware' => [], 'prefix' => 'branch'], function () {
    Route::controller(LocationController::class)->group(function() {
        Route::get('get', 'getBranch');
        Route::get('getAll', 'getBranches');
        Route::post('create', 'createBranch');
        Route::put('update', 'updateBranch');
    });
});
