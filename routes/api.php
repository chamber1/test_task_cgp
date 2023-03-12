<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ClientController;

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
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/token', [AuthController::class,'token']);
    Route::post('/me', [AuthController::class,'me']);
    Route::post('/tokenid', [AuthController::class,'tokenId']);
});

Route::get('/get_companies', [CompanyController::class,'getCompanies'])->middleware('bearer.verify');
Route::get('/get_clients', [ClientController::class,'getClients'])->middleware('bearer.verify');
Route::get('/get_client_companies', [ClientController::class,'getClientCompanies'])->middleware('bearer.verify');
