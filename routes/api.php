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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'auth:api'], function (){

});
Route::post('/userClients','Api\UserApiController@store')->name('userClients.store')->middleware(['auth:api','permission:add medical staff']);
Route::post('/create-clinic','Api\ClinicApiController@store')->name('server.clinic.store')->middleware(['auth:api','permission:add clinic']);
Route::post('/edit-clinic','Api\ClinicApiController@updateClinic')->name('server.clinic.edit')->middleware(['auth:api','permission:edit clinic']);
Route::get('/test','Api\AuthController@testApi')->middleware(['auth:api']);
Route::post('/threshold','Api\ThresholdController@save')->middleware(['auth:api']);
Route::post('/login','Api\AuthController@authenticate');
Route::post('/users','Api\UserApiController@store');

