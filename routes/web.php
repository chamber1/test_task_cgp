<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\GoogleLogoutController;
use \App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', function () {
    return view('home');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'socialLogin'])->where('provider','google');
Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->where('provider','google');
Route::match(['GET','POST'],'logout/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->where('provider','google');

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




