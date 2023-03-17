<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserPasswordController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Route::get('users', [UserPasswordController::class, 'index'])->name('v1.rabi.passwordList');
    Route::get('decrypt/{id}', [UserPasswordController::class, 'decryptPassword'])->name('v1.rabi.passwordDecrypt');
    Route::post('login', [AuthController::class, 'login'])->name('v1.rabi.login');
    Route::group(['middleware' => ['auth:admin']],function () {
            Route::post('logout', [AuthController::class, 'logout'])->name('v1.rabi.logout');
            Route::get('me', [AuthController::class, 'me'])->name('v1.rabi.me');
            Route::post('password', [AuthController::class, 'password'])->name('v1.rabi.password');
            Route::get('passwords', [UserPasswordController::class, 'index'])->name('v1.rabi.passwordList');
            Route::post('create', [UserPasswordController::class, 'createPasswordRecord'])->name('v1.rabi.create.password');

        }
    );
});
