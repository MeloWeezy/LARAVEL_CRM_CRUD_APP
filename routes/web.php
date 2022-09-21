<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

require __DIR__.'/auth.php';
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
  
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('verified');

Route::middleware(['auth','role:super_admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group( function() {
        Route::get('/',[IndexController::class,'index'])->name('index');
        Route::resource('/roles',RoleController::class);
        Route::resource('/permissions',PermissionController::class);
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

        Route::resource('/users', UsersController::class);

        Route::post('/users/{user}/roles', [UsersController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UsersController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UsersController::class, 'givePermission'])->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UsersController::class, 'revokePermission'])->name('users.permissions.revoke');
    }
);


    Route::middleware(['auth'])->group(function(){
    Route::resource('accounts', AccountsController::class);
    Route::resource('contacts', ContactsController::class);
    Route::resource('organizations', OrganizationsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('Dashboard', DashboardController::class);
    

   
});









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
