<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user',], function () {
    Route::post('/reset', [UserController::class, 'resetPassword'])->middleware('guest');
    Route::post('/save', [UserController::class, 'save']);
    Route::post('/login', [UserController::class, 'login']);
    Route::middleware('auth:sanctum')->get('/get', [UserController::class, 'getUserData']);
    //Route::middleware('auth:sanctum')->post('/mail', [UserController::class, 'changeEmail']);
});
