<?php

use App\Http\Controllers\GruposController;
use App\Http\Controllers\MensagensController;
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

Route::get('/grupil/{id}', MensagensController::class . '@getAll');

route::post('/search-groups', GruposController::class . '@getThis');

route::post('message-send/{id}', MensagensController::class . '@send');

route::get('/join-group/{id}', UserGroupController::class . '@join');

route::get('/leave-group/{id}', UserGroupController::class . '@leave');

route::post('/new-group', GruposController::class . '@newGroup');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', GruposController::class . '@getAll');
});
