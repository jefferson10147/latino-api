<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LogsController;
use App\Http\Controllers\SportClubsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCommentsController;
use App\Http\Controllers\AssociateMembersController;
use App\Http\Controllers\WagesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\RerservationsController;
use App\Http\Controllers\ReservedAreasController;
use App\Http\Controllers\PicturesController;
use App\Http\Controllers\LoginController;

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

Route::resource('logs', LogsController::class, ['except' => ['create', 'edit']]);
Route::resource('sport-clubs', SportClubsController::class, ['except' => ['create', 'edit']]);
Route::resource('roles', RolesController::class, ['except' => ['create', 'edit']]);
Route::resource('news', NewsController::class, ['except' => ['create', 'edit']]);
Route::resource('news-comments', NewsCommentsController::class, ['except' => ['create', 'edit']]);
Route::resource('associate-members', AssociateMembersController::class, ['except' => ['create', 'edit']]);
Route::resource('wages', WagesController::class, ['except' => ['create', 'edit']]);
Route::resource('areas', AreasController::class, ['except' => ['create', 'edit']]);
Route::resource('rerservations', RerservationsController::class, ['except' => ['create', 'edit']]);
Route::resource('reserved-areas', ReservedAreasController::class, ['except' => ['create', 'edit']]);
Route::resource('pictures', PicturesController::class, ['except' => ['create', 'edit']]);

Route::post('/login', [LoginController::class, 'login']);
