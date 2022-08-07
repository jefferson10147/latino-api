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

/*
    RUTAS Y METODOS a los que un usuario normal puede acceder:


    - GET /api/news: Obtiene todas las noticias
    - GET /api/news/{id}: Obtiene una noticia por id
    
    - GET /api/news-comments: Obtiene todos los comentarios de las noticias
    - POST /api/news-comments: Crea un comentario de una noticia

    
    - GET /api/reservations/{id}: Obtiene una reserva por ID (que estan asociadas a un usuario)
    - POST /api/reservations: Crea una reserva
    - PATCH /api/reservations/{id}: Actualiza una reserva
    - DELETE /api/reservations/{id}: Elimina una reserva por ID (que estan asociadas a un usuario)

    - GET /api/associate-members: Obtiene todos los miembros asociados a un usuario

    - GET /api/wages: Obtiene todas las facturas asociadas a su cuenta

    El resto de rutas y metodos en cada una de ellas deben ser accedidas por un usuario administrador
*/

Route::middleware(['SessionValidateAdmin'])->group(function () {
    Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
    Route::resource('roles', RolesController::class, ['except' => ['create', 'edit']]);
});

Route::resource('logs', LogsController::class, ['except' => ['create', 'edit']]);

Route::middleware(['SessionValidateAdminUser'])->group(function () {
    Route::resource('sport-clubs', SportClubsController::class, ['except' => ['create', 'edit']]);
    Route::resource('associate-members', AssociateMembersController::class, ['except' => ['create', 'edit']]);
});

Route::resource('news', NewsController::class, ['except' => ['create', 'edit']]);
Route::resource('news-comments', NewsCommentsController::class, ['except' => ['create', 'edit']]);
Route::resource('wages', WagesController::class, ['except' => ['create', 'edit']]);
Route::resource('areas', AreasController::class, ['except' => ['create', 'edit']]);
Route::resource('reservations', ReservationsController::class, ['except' => ['create', 'edit']]);
Route::resource('reserved-areas', ReservedAreasController::class, ['except' => ['create', 'edit']]);
Route::resource('pictures', PicturesController::class, ['except' => ['create', 'edit']]);

Route::post('/login', [LoginController::class, 'login']);

// middleware('SessionValidateAdmin') ID_ROLE_ADMIN=1
// middleware('SessionValidateUser') ID_ROLE_USER=2