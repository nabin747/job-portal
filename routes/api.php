<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController as UserControllerAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('/register',[AuthController::class,'register']);
//Route::resource('jobs', JobController::class);



Route::middleware('auth:api')->group(function () {
//    Route::get('jobs', [JobController::class, 'index']);
    Route::post('jobs', [JobController::class, 'store']);
    Route::get('jobs/{id}', [JobController::class, 'show']);
    Route::put('jobs/{id}', [JobController::class, 'update']);
    Route::delete('jobs/{id}', [JobController::class, 'destroy']);
});

//current user route
Route::get('/users',[UserControllerAlias::class,'index'])->middleware('auth:api');

Route::get('jobs', [JobController::class, 'index']);
