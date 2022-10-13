<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ApiController;
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
Route::group(['middleware'=>'auth:sanctum'],function()
{
Route::post('apicon', [ApiController::class,'index']);
Route::resource('contacts', ContactsController::class);
Route::resource('organizations', OrganizationsController::class);
Route::resource('users', UsersController::class);
Route::resource('accounts', AccountsController::class);

});

Route::group(['middleware' => ['web']], function () {
    // your routes here
  
    Route::Post('login', [AuthenticatedSessionController::class,'store']);
    Route::Post('register', [RegisterController::class,'create']);
});

