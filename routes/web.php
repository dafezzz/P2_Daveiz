<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PackageController;




/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('landingpages'));

/*
|--------------------------------------------------------------------------
| Auth (Custom)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard (Protected by auth + role)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class,'admin'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

        


    Route::get('/agent/dashboard', [DashboardController::class,'agent'])
        ->middleware('role:agent')
        ->name('agent.dashboard');

    Route::get('/jemaah/dashboard', [DashboardController::class,'jemaah'])
        ->middleware('role:jemaah')
        ->name('jemaah.dashboard');


        Route::resource('users', UserManagementController::class);

Route::resource('packages', PackageController::class);
});

/*
|--------------------------------------------------------------------------
| Optional Preview
|--------------------------------------------------------------------------
*/
Route::get('/preview', fn () => view('auth.preview'));