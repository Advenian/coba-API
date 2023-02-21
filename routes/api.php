<?php

use App\Http\Controllers\API\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('pokemon', [PokemonController::class, 'index']);
Route::post('pokemon/store', [PokemonController::class, 'store']);
Route::put('pokemon/update/{pokemon}', [PokemonController::class, 'update']);
Route::get('pokemon/{pokemon}', [PokemonController::class, 'show']);
Route::delete('pokemon/destroy/{pokemon}', [PokemonController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
