<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\StatsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
    
// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/jobs',[JobController::class,'index']);
    Route::get('/jobs/{jobs}',[JobController::class,'show']);
    Route::post('/jobs',[JobController::class,'store']);
    Route::patch('/jobs/{job}', [JobController::class, 'update']);
    Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('jobs', JobController::class);
    Route::get('stats', [StatsController::class, 'index']);
});
