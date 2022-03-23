<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurentsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::get('/welcome','welcomeProject@welcome');

Route::post('/register', [UserController::class,'userRegister']);

Route::get('/list',[UserController::class,'getUsers']);

Route::get('/restaurents',[RestaurentsController::class,'getAllRestaurents']);

Route::post('/login',[UserController::class,'userLogin']);

Route::post('/adminReg',[AdminController::class,'adminRegister']);

Route::post('/adminLog',[AdminController::class,'adminLogin']);