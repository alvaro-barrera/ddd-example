<?php

use Illuminate\Http\Request;

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

Route::post('store-user','API\v1\User\UserCrudController@store');
Route::put('update-user','API\v1\User\UserCrudController@update');
Route::delete('delete-user','API\v1\User\UserCrudController@delete');
Route::post('restore-user','API\v1\User\UserCrudController@restore');

