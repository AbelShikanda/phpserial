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
    return view('admin.admin.index');});
    // ->middleware('adminauth');


Route::group(['prefix' => '/admin_'], function() {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::resource('/dashboard', DashboardController::class);
    // Route::resource('/dashboard', DashboardController::class)->middleware('adminauth');
    // Route::get('/dashboard', [DashboardController::class, 'data'])->name('data');
});

Route::get('/show', [DashboardController::class, 'show'])->name('show');
Route::get('/shows', [NotificationsController::class, 'shows'])->name('shows');
Route::resource('/notifications', NotificationsController::class);

// Route::group(['middleware' => 'adminauth'], function() {
//     Route::resource('permissions', PermissionsController::class);
//     Route::resource('roles', RolesController::class);
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/logs', [AccessLogsController::class, 'index'])->name('logs');
