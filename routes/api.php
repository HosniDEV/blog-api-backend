<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/



// auth

Route::prefix('auth/v1')->group(function () {
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout'])->middleware('auth');
});

// admin

Route::group(['prefix'=>'admin/v1','namespace'=>'App\Http\Controllers\Api\V1','middleware'=>['auth:sanctum','admin']],function(){
    // routes for posts
    Route::prefix('posts')->group(function () {
        Route::get('/',[PostController::class,'index']);
        Route::get('{post:slug}',[PostController::class,'show']);
        Route::post('/',[PostController::class,'store']);
        Route::delete('{post:slug}',[PostController::class,'destroy']);
        Route::patch('{post:slug}',[PostController::class,'update']);
        Route::put('{post:slug}',[PostController::class,'update']);
    });

    // Route::apiResource('tags',TagController::class);
    Route::apiResource('categories',CategoryController::class);
    Route::apiResource('comments',CommentController::class);
    Route::apiResource('tags',TagController::class);
 });



Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1',],function(){
    // routes for posts
    Route::prefix('posts')->group(function () {
        Route::get('/',[PostController::class,'index']);
        Route::get('{post:slug}',[PostController::class,'show']);
    });

    // // Route::apiResource('tags',TagController::class);
    // Route::apiResource('categories',CategoryController::class);
    // Route::apiResource('comments',CommentController::class);
    // Route::apiResource('tags',TagController::class);
 });
