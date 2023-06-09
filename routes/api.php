<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Video2Controller;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\API\FotoController;

use App\Http\Controllers\VideoProvaController;

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

Route::get('/news',[App\Http\Controllers\NewsController::class, 'index']);

Route::get('/news/{id}',[App\Http\Controllers\NewsController::class, 'show']);

Route::post('/save',[App\Http\Controllers\NewsController::class, 'store']);

Route::put('/update/{id}',[App\Http\Controllers\NewsController::class, 'update']);

Route::delete('/delete/{id}',[App\Http\Controllers\NewsController::class, 'destroy']);

//

Route::get('/movies',[App\Http\Controllers\VideoController::class, 'index']);

Route::get('/movies/{id}',[App\Http\Controllers\VideoController::class, 'show']);

Route::post('/movies-save',[App\Http\Controllers\VideoController::class, 'store']);

Route::put('/movies-update/{id}',[App\Http\Controllers\VideoController::class, 'update']);

Route::delete('/movies-delete/{id}',[App\Http\Controllers\VideoController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[UserController::class, 'login']);

Route::get('login',[UserController::class, 'index']);

Route::delete('/userdelete/{id}',[UserController::class, 'destroy']);

Route::post('register',[UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

//
Route::get('/movie',[App\Http\Controllers\VideoController::class, 'index']);

// Route::post('/insert',[VideoController::class, 'insert']);
Route::post('/insert',[FotoController::class, 'insert']);


Route::post('/insert_video',[VideoController::class, 'store']);

// Route::post('/insert_video',[VideoProvaController::class, 'insertvideo']);


// Route::post('/upload',[Video2Controller::class, 'insert']);




