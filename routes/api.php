<?php

use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\UserAuthController;

Route::group(['middleware'=>['auth:sanctum']],function(){
  
  Route::group(['prefix'=>'v1' , 'namespace' => 'App\Http\Controllers\Api\V1'],function(){
    Route::apiResource('users',UserController::class);
    Route::apiResource('tasks',TaskController::class);
    Route::put('userput/{user}',[Usercontroller::class,'update']);
  });

});


Route::post('register',[UserAuthController::class,'register'])->name('users.registers');
Route::post('login',[UserAuthController::class,'login'])->name('users.logins');
Route::post('logout',[UserAuthController::class,'logout'])->name('users.logouts')
  ->middleware('auth:sanctum');

