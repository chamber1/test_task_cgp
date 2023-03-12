<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');

    //Clients CRUD operations
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/',[ClientController::class, 'index'])->name('admin.clients.index');
        Route::get('/data',[ClientController::class, 'data'])->name('admin.clients.data');
        Route::get('/create', [ClientController::class, 'create'])->name('admin.clients.create');
        Route::post('/store', [ClientController::class, 'store'])->name('admin.clients.store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
        Route::post('/{client}/update', [ClientController::class, 'update'])->name('admin.clients.update');
        Route::post('/delete', [ClientController::class, 'delete'])->name('admin.clients.delete');
    });

    //Companies CRUD operations
    Route::group(['prefix' => 'companies'], function () {
        Route::get('/',[CompanyController::class, 'index'])->name('admin.companies.index');
        Route::get('/data',[CompanyController::class, 'data'])->name('admin.companies.data');
        Route::get('/create', [CompanyController::class, 'create'])->name('admin.companies.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('admin.companies.store');
        Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('admin.companies.edit');
        Route::post('/{company}/update', [CompanyController::class, 'update'])->name('admin.companies.update');
        Route::post('/delete', [CompanyController::class, 'delete'])->name('admin.companies.delete');
    });
});

Route::get('/logout', [LoginController::class,'logout'])->name('logout');




