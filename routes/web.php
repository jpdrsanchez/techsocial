<?php

use App\App\Dashboard\Controllers\AuthController;
use App\App\Dashboard\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/dashboard');
Route::redirect('/home', '/dashboard');
Route::redirect('/dashboard', '/dashboard/customers');

Route::name('web.')->group(function () {
    Route::controller(AuthController::class)
        ->group(function () {
            Route::get('/login', 'login')->name('login')->middleware('guest');
            Route::post('/login', 'authenticate')->name('authenticate');
            Route::get('/register', 'register')->name('register')->middleware('guest');
            Route::post('/register', 'create')->name('create');
            Route::post('/logout', 'logout')->name('logout');
        });

    Route::middleware('auth')->group(function () {
        Route::prefix('/dashboard')->group(function () {
            Route::name('dashboard.')->group(function () {
                Route::resource('customers', CustomersController::class)->except('show');
            });
        });
    });
});
