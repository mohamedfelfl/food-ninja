<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user',], function () {
    Route::post('/reset', [UserController::class, 'resetPassword'])->middleware('guest');
    Route::post('/save', [UserController::class, 'save']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/firebase', [UserController::class, 'firebaseLogin']);
    Route::middleware('auth:sanctum')->get('/get', [UserController::class, 'getUserData']);
    Route::middleware('auth:sanctum')->get('/logout', [UserController::class, 'logout']);
});
Route::group(['prefix' => 'offers'] , function (){
    Route::post('/add', [OffersController::class, 'add']);
    Route::post('/update', [OffersController::class, 'update']);
    Route::post('/delete', [OffersController::class, 'delete']);
    Route::post('/get', [OffersController::class, 'get']);
    Route::get('/all', [OffersController::class, 'allOffers']);
});
Route::group(['prefix' => 'meals'] , function (){
    Route::post('/add', [MealController::class, 'add']);
    Route::post('/update', [MealController::class, 'update']);
    Route::post('/delete', [MealController::class, 'delete']);
    Route::post('/get', [MealController::class, 'get']);
    Route::get('/all', [MealController::class, 'allMeals']);
});
Route::group(['prefix' => 'update', 'middleware' => 'auth:sanctum'], function (){
    Route::post('/basic', [UserUpdateController::class, 'updateBasicInfo']);
    Route::post('/email', [UserUpdateController::class, 'updateEmail']);
    Route::post('/password', [UserUpdateController::class, 'updatePassword']);
    Route::post('/address', [UserUpdateController::class, 'updateAddresses']);
    Route::post('/card', [UserUpdateController::class, 'updateCards']);
    Route::post('/image', [UserUpdateController::class, 'updateImage']);
});
Route::group(['prefix' => 'orders', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/get', [OrderController::class, 'getOrders']);
    Route::post('/status', [OrderController::class, 'updateOrderStatus']);
    Route::get('/add', [OrderController::class, 'addOrder']);
});
