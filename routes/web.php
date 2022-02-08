<?php

use App\Http\Controllers\dashboard\AdminsController;
use App\Http\Controllers\Dashboard\SubadminsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::namespace('/dashboard')
    ->prefix('dashboard')
    ->group(function() {

        // Start Admin Route [ Admin Controller ]
        Route::group([
            'prefix' => 'admins',
            'as' => 'admin.',
        ], function() {

            Route::get('/trash', [AdminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [AdminsController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [AdminsController::class, 'forceDelete'])->name('force-delete');

            Route::get('/' , [AdminsController::class, 'index'])->name('index');
            Route::get('/create' , [AdminsController::class, 'create'])->name('create');
            Route::post('/' , [AdminsController::class, 'store'])->name('store');
            Route::get('/{id}/edit' , [AdminsController::class, 'edit'])->name('edit');
            Route::put('/{id}' , [AdminsController::class, 'update'])->name('update');
            Route::delete('/{id}' , [AdminsController::class, 'destroy'])->name('delete');
        });
        // End Admin Route [ Admin Controller ]

        // Start Sub-admins Route [ Subadmins Controller ]
        Route::group([
            'prefix' => 'subadmins',
            'as' => 'subadmin.',
        ], function() {
            Route::get('/trash', [SubadminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [SubadminsController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [SubadminsController::class, 'forceDelete'])->name('force-delete');

            Route::get('/' , [SubadminsController::class, 'index'])->name('index');
            Route::get('/create' , [SubadminsController::class, 'create'])->name('create');
            Route::post('/' , [SubadminsController::class, 'store'])->name('store');
            Route::get('/{id}/edit' , [SubadminsController::class, 'edit'])->name('edit');
            Route::put('/{id}' , [SubadminsController::class, 'update'])->name('update');
            Route::delete('/{id}' , [SubadminsController::class, 'destroy'])->name('delete');
        });
        // End Sub-admins Route [ Subadmins Controller ]




    });
