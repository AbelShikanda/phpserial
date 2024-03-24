<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccessLogsController;
use App\Http\Controllers\NotificationsController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/admin_', function () {
    return redirect()->route('dashboard.index');})
    ->middleware('adminauth');

Route::group(['prefix' => '/admin_'], function() {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::resource('/dashboard', DashboardController::class)->middleware('adminauth');
});

// Route::get('/shows', [NotificationsController::class, 'shows'])->name('shows');

// Route::group(['middleware' => 'adminauth'], function() {
    //     Route::resource('permissions', PermissionsController::class);
    //     Route::resource('roles', RolesController::class);
    // });
    
Route::get('/', function () {
    return view('welcome');
});
    
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::patch('/update_timer_stop', [HomeController::class, 'update_timer_stop'])->name('update_timer_stop');

Route::get('/logs', [AccessLogsController::class, 'index'])->name('logs');
Route::post('/store', [AccessLogsController::class, 'store'])->name('store');

Route::resource('/notifications', NotificationsController::class);