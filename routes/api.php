<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::post('tasks',[TaskController::class,'store']);
// Route::get('tasks',[TaskController::class,'index']);
// Route::put('tasks/{id}',[TaskController::class,'update']);
// Route::delete('tasks/{id}',[TaskController::class,'destroy']);




Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('logout', [UserController::class,'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function()
{






Route::apiResource('tasks',TaskController::class);


Route::prefix('profile')->group(function(){
Route::post('',[ProfileController::class,'store']);
Route::get('/{id}',[ProfileController::class,'show']);
Route::get('/{id}',[ProfileController::class,'update']);
});

Route::get('User',[UserController::class,'GetUser']);

Route::post('tasks/{taskid}/categories',[TaskController::class,'addcategoriestoTask']);

Route::get('task/all',[TaskController::class,'getAllTasks'])->middleware('checkuser');



});

