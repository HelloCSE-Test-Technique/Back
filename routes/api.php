<?php

use App\Http\Controllers\Api\StarController;
use App\Http\Controllers\Api\Test;
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

//route of my api CRUD
Route::apiResource('/stars', StarController::class);