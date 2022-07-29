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