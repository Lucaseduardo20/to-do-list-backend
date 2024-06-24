<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use http\Client\Request;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
