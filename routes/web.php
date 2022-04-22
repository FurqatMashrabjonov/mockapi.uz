<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/projects', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//API in WEB

Route::controller(ProjectController::class)
    ->middleware('auth')->prefix('/projects')
    ->group(function () {
        Route::get('/', 'get');
        Route::get('/{project}', 'getSingle');
        Route::post('/', 'store');
        Route::post('/{project}', 'update');
        Route::delete('/{project}', 'destroy');
    });


Route::controller(ResourceController::class)
    ->middleware('auth')->prefix('/resources')
    ->group(function () {
        Route::get('/', 'get');
        Route::get('/{resource}', 'getSingle');
        Route::post('/', 'store');
        Route::post('/{resource}', 'update');
        Route::delete('/{resource}', 'destroy');
    });


//----------------------------------------------------------[

Route::any('/{any}', function () {
    if (auth()->check()) {
        return view('home');
    } else {
        return view('welcome');
    }
})->where('any', '.*');
