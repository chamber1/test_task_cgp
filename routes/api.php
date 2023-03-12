<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('auth/login', [AuthController::class,'login']);
Route::get('auth/logout', 'AuthController@logout');
Route::get('auth/token', 'AuthController@token');
Route::get('auth/me', 'AuthController@me');
Route::get('auth/tokenid', 'AuthController@tokenId');
