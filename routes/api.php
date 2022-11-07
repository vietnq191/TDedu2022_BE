<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassword']);
    Route::post('/send-reset-password', [AuthController::class, 'sendResetPassword']);
    Route::put('/reset-password', [AuthController::class, 'resetPassword']);
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
});

Route::prefix('user')->group(function () {
    Route::resource('/', UserController::class)->parameters(['' => 'id']);
});

Route::delete('/bulk-delete-user', [UserController::class, 'bulkDeleteUser']);
Route::get('/export-all-user', [UserController::class, 'exportAllUser']);
Route::get('/export-user', [UserController::class, 'exportUser']);