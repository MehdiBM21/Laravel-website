<?php

use App\Http\Controllers\Api\V1\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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
Route::get('/test',[DataController::class, 'getdata']);

// Route::group(['prefix' => 'v1', 'namespace'=> '\App\Http\Controllers\Api\V1'], function(){
//     Route::apiResource('clients', ClientController::class);
//     Route::apiResource('factures', FactureController::class);
    
// });