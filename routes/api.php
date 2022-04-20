<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Main URL for the API (e.g. http://mockapi.uz/api)
Route::controller(ApiController::class)->group(function () {
    Route::get(env('ROUTER_MAIN'), 'get');
    Route::get(env('ROUTER_MAIN') . "/{id}", 'getSingle');
    Route::post(env('ROUTER_MAIN'), 'store');
    Route::put(env('ROUTER_MAIN') . "/{id}", 'update');
    Route::patch(env('ROUTER_MAIN') . "/{id}", 'update');
    Route::delete(env('ROUTER_MAIN') . "/{id}", 'delete');
});

//Route::group(['domain' => '{token}.mockapi.uz', 'controller' => ApiController::class], function () {
//    Route::get('/', function ($account) {
//        return $account;
//    });
//});
