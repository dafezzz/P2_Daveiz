<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\JamaahGroupController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('landingpages'));


/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Protected (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard by Role
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [DashboardController::class,'admin'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/agent/dashboard', [DashboardController::class,'agent'])
        ->middleware('role:agent')
        ->name('agent.dashboard');

    Route::get('/jemaah/dashboard', [DashboardController::class,'jemaah'])
        ->middleware('role:jemaah')
        ->name('jemaah.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Admin Only
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        // USER MANAGEMENT
        Route::resource('users', UserManagementController::class);

        // PACKAGE MANAGEMENT
        Route::resource('packages', PackageController::class);

        // JAMAAH MANAGEMENT
        Route::resource('jamaahs', JamaahController::class);

        // COMPANY MANAGEMENT
         Route::resource('companies', CompanyController::class);

        // JAMAAH GROUP MANAGEMENT
        Route::resource('jamaah-groups', JamaahGroupController::class);

        // UPDATE STATUS JAMAAH
        Route::patch(
            'jamaahs/{jamaah}/status',
            [JamaahController::class, 'updateStatus']
        )->name('jamaahs.updateStatus');

    });

});


/*
|--------------------------------------------------------------------------
| Optional Preview
|--------------------------------------------------------------------------
*/

Route::get('/preview', fn () => view('auth.preview'));