<?php

use App\Http\Controllers\GruposController;
use App\Http\Controllers\UserGroupController;
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

Route::get('/', GruposController::class . '@getAll');

Route::get('/grupil', function () {
    return view('messages');
});

route::get('/join-group/{id}', UserGroupController::class . '@join');

route::get('/leave-group/{id}', UserGroupController::class . '@leave');

route::post('/new-group', GruposController::class . '@newGroup');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('HomePage');
    })->name('inicio');
});
