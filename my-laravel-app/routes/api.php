<?php

use App\Http\Controllers\Bitrix24Controller;
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
Route::delete('LessonUser/{id}' , [\App\Http\Controllers\LessonController::class , 'deletedLessonUser']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::post('/find-or-create-contact', [Bitrix24Controller::class, 'findOrCreateContact']);

