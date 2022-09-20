<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ReviewsController;

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

Route::apiResource('bootcamps' , BootcampsController::class);
Route::apiResource('courses' , CoursesController::class);
Route::apiResource('reviews' , ReviewsController::class);
//Ruta especifica para crearle un curso a un bootcam 
Route::post ("courses/{idbootcamp}/create",
[CoursesController::class , "store"]);

Route::post ("reviews/{idbootcamp}/create",
[ReviewsController::class , "store"]);
