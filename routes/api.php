<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\UsersController;
use App\Http\Resources\AccountResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\Resource;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('contacts', ContactsController::class);
    Route::apiResource('organizations', OrganizationsController::class);
    Route::apiResource('users', UsersController::class);
    Route::apiResource('accounts', AccountsController::class);

    Route::Post('contacts/create', 'App\Http\Controllers\ContactsController@store');


    Route::Post('organizations/create', 'App\Http\Controllers\OrganizationsController@store');


    Route::Post('accounts/create', 'App\Http\Controllers\AccountsController@store');


    Route::Post('users/create', 'App\Http\Controllers\UsersController@store');

    Route::get('dashboard', App\Http\Controllers\DashboardController::class)->name('dashboard')->middleware('verified');


});

Route::group(['middleware' => ['web']], function () {
    // your routes here

    Route::Post('login', [AuthenticatedSessionController::class, 'store']);
    Route::Post('register', [RegisterController::class, 'create']);
});

Route::middleware(['auth:sanctum', 'role:super_admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::apiResource('/roles', RoleController::class);
        Route::apiResource('/permissions', PermissionController::class);
        Route::apiResource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::apiResource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::apiResource('/users', UsersController::class);

        Route::Post('roles/create', 'App\Http\Controllers\Admin\RoleController@store');
        Route::PUT('/roles/update/{id}', 'App\Http\Controllers\Admin\RoleController@update');
        Route::PUT('/permissions/update/{id}', 'App\Http\Controllers\Admin\PermissionController@update');


        Route::post('/users/{user}/roles', [UsersController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UsersController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UsersController::class, 'givePermission'])->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UsersController::class, 'revokePermission'])->name('users.permissions.revoke');
    }
    );
