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


//CapaPP Connections

//validator

Route::get('validator/{tocken}', ['uses' =>'AppComunicator@app_validate']);


//recivecapadus

Route::post('recivecapadus/{tocken}', ['uses' =>'AppComunicator@app_recivecapadus']);


//sendcapadus

Route::get('sendcapadus/{tocken}', ['uses' =>'AppComunicator@app_sendcapadus']);