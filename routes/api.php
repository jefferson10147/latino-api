<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\SportClubsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCommentsController;
use App\Http\Controllers\AssociateMembersController;
use App\Http\Controllers\WagesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReservedAreasController;
use App\Http\Controllers\PicturesController;
use App\Http\Controllers\LoginController;
use App\Models\NewsComment;

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

Route::middleware(['SessionValidateAdmin'])->group(function () {
    Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
    Route::resource('roles', RolesController::class, ['except' => ['create', 'edit']]);
});

Route::resource('logs', LogsController::class, ['except' => ['create', 'edit']]);

Route::middleware(['SessionValidateAdminUser'])->group(function () {
    Route::resource('sport-clubs', SportClubsController::class, ['except' => ['create', 'edit']]);
    Route::resource('associate-members', AssociateMembersController::class, ['except' => ['create', 'edit']]);
    Route::resource('wages', WagesController::class, ['except' => ['create', 'edit']]);
    Route::resource('areas', AreasController::class, ['except' => ['create', 'edit']]);
    Route::resource('reservations', ReservationsController::class, ['except' => ['create', 'edit']]);
    Route::resource('reserved-areas', ReservedAreasController::class, ['except' => ['create', 'edit']]);
    Route::resource('pictures', PicturesController::class, ['except' => ['create', 'edit']]);
});

Route::resource('news', NewsController::class, ['except' => ['create', 'edit']]);
Route::get('/full-news/{id}', [NewsController::class, 'getFullNews']);
Route::resource('news-comments', NewsCommentsController::class, ['except' => ['create', 'edit']]);
Route::get('/comments-by-new/{id}', [NewsCommentsController::class, 'getCommentByNewId']);

Route::post('/login', [LoginController::class, 'login']);

// middleware('SessionValidateAdmin') ID_ROLE_ADMIN=1
// middleware('SessionValidateUser') ID_ROLE_USER=2