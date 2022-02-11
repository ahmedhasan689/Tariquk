<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\CitiesController;
use App\Http\Controllers\Dashboard\SubadminsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NotificationsController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\ReportsController;
use App\Http\Controllers\Front\PathsController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\SelectionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/instruct', [HomeController::class, 'instruct'])->name('instruct');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [HomeController::class, 'destroy'])->middleware(['auth:web'])->name('user.logout');

// Search Controller
Route::get('/search', [SearchController::class, 'search'])->name('search');


// Notification Controller
Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.read');

// Path Controller
Route::get('/path', [PathsController::class, 'create'])->name('path.create');
Route::post('/path', [PathsController::class, 'store'])->name('path.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Index
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:admin,subadmin'])->name('dashboard');

Route::get('/selection', [SelectionController::class, 'index'])->name('selection');

// Start Report Route [ ReportController ]
Route::group([
    'prefix' => 'report',
    'as' => 'report.'
], function() { 
    Route::get('/', [ReportsController::class, 'index'])->name('index');
    Route::get('/create', [ReportsController::class, 'create'])->name('create');
    Route::post('/', [ReportsController::class, 'store'])->name('store');
});
// End Report Route [ ProfileController ]

Route::namespace('/Front')
    ->prefix('home')
    ->middleware(['auth:web'])
    ->group(function () {

        // Start Profile Route [ ProfileController ]
        Route::group([
            'prefix' => 'profile',
            'as' => 'profile.'
        ], function() { 
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::get('/create', [ProfileController::class, 'create'])->name('create');
            Route::post('/', [ProfileController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('delete');
        });
        // End Profile Route [ ProfileController ]
    });

Route::namespace('/dashboard')
    ->prefix('dashboard')
    ->middleware(['auth:admin,subadmin'])
    ->group(function () {

        // Start Admin Route [ Admin Controller ]
        Route::group([
            'prefix' => 'admins',
            'as' => 'admin.',
        ], function () {
            Route::get('/trash', [AdminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [AdminsController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [AdminsController::class, 'forceDelete'])->name('force-delete');
            Route::get('/', [AdminsController::class, 'index'])->name('index');
            Route::get('/create', [AdminsController::class, 'create'])->name('create');
            Route::post('/', [AdminsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminsController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminsController::class, 'destroy'])->name('delete');
        });
        // End Admin Route [ Admin Controller ]

        // Start Sub-admins Route [ Subadmins Controller ]
        Route::group([
            'prefix' => 'subadmins',
            'as' => 'subadmin.',
        ], function () {
            Route::get('/trash', [SubadminsController::class, 'trash'])->name('trash');
            Route::put('/trash/{id?}', [SubadminsController::class, 'restore'])->name('restore');
            Route::delete('/trash/{id?}', [SubadminsController::class, 'forceDelete'])->name('force-delete');

            Route::get('/', [SubadminsController::class, 'index'])->name('index');
            Route::get('/create', [SubadminsController::class, 'create'])->name('create');
            Route::post('/', [SubadminsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [SubadminsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [SubadminsController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubadminsController::class, 'destroy'])->name('delete');
        });
        // End Sub-admins Route [ Subadmins Controller ]

        // Start Cities Route [ Cities Controller ]
        Route::group([
            'prefix' => 'cities',
            'as' => 'city.'
        ], function() {
            Route::get('/rafah', [CitiesController::class, 'rafah'])->name('rafah');
            Route::get('/khanyounis', [CitiesController::class, 'khanYouins'])->name('khanyounis');
            Route::get('/middle', [CitiesController::class, 'middle'])->name('middle');
            Route::get('/gaza', [CitiesController::class, 'gaza'])->name('gaza');
            Route::get('/jabalia', [CitiesController::class, 'jabalia'])->name('jabalia');
            Route::get('/beitlahia', [CitiesController::class, 'beitLahia'])->name('beitlahia');
            Route::get('/beithanoun', [CitiesController::class, 'beitHanoun'])->name('beithanoun');

            // To Update Report ( show_status => 1 )
            Route::put('/{id}', [CitiesController::class, 'showStatus'])->name('update');

            // To Delete Report From DB 
            Route::delete('/{id}', [CitiesController::class, 'remove'])->name('delete');
        });

    });
