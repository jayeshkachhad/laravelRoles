<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/demo', function () {
    return ["Demo" => "bvhkebkjv"];
});

Route::get('/newapi', function () {
    return ["message" => "got it"];
});

Route::post('login', [UserAuthController::class, 'login']);
Route::post('signup', [UserAuthController::class, 'signup']);
Route::post('signup2', [UserAuthController::class, 'signup2']);
Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('/products', [UserController::class, 'getStudents']);
Route::get('/justapi', [UserController::class, 'justapi']);

Route::group(['middleware' => "auth:sanctum"], function () {

    Route::get('/users', [UserController::class, 'users']);
    // Route::post('/add', [UserController::class, 'addStudent']);
    // Route::post('/add2', [UserController::class, 'add2']);
});
