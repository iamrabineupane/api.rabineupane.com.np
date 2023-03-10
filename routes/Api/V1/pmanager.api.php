<?php

use App\Http\Controllers\Api\V1\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get('users', 'Api\V1\UserPasswordController@index');
});
Route::group(['prefix' => 'v1'], function () {
    Route::get('decrypt/{id}', 'Api\V1\UserPasswordController@decryptPassword');
});
