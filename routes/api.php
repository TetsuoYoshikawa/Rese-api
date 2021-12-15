<?php

use App\Http\Controllers\AdminsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReviewsController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/restaurants', [RestaurantsController::class, 'get']);
Route::get('/restaurants/user/{user_id}', [RestaurantsController::class, 'getUser']);
Route::get('/restaurants/{id}', [RestaurantsController::class, 'getRestaurant']);
Route::get('/prefectures', [RestaurantsController::class, 'getPrefecture']);
Route::get('/genres', [RestaurantsController::class, 'getGenre']);
Route::get('/reviews', [ReviewsController::class, 'getReview']);

Route::group([
    'middleware' => 'api', 'prefix' => 'auth'
], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::get('/reservations/{user_id}', [ReservationsController::class, 'get']);
    Route::post('/reservations', [ReservationsController::class, 'post']);
    Route::put('/reservations', [ReservationsController::class, 'put']);
    Route::delete('/reservations', [ReservationsController::class, 'delete']);

    Route::get('/favorites/{user_id}', [FavoritesController::class, 'get']);
    Route::post('/favorites', [FavoritesController::class, 'post']);
    Route::delete('/favorites', [FavoritesController::class, 'delete']);

    Route::post('/reviews', [ReviewsController::class, 'post']);
    Route::put('/reviews', [ReviewsController::class, 'put']);
    Route::delete('/reviews', [ReviewsController::class, 'delete']);

    Route::get('/admin/reservation', [AdminsController::class, 'getReservation']);
    Route::get('/admin/favorite', [AdminsController::class, 'getfavorite']);
    Route::put('/admin/restaurants', [AdminsController::class, 'put']);
    Route::post('/admin/restaurants', [AdminsController::class, 'post']);
    Route::delete('/admin/restaurants', [AdminsController::class, 'delete']);
});
