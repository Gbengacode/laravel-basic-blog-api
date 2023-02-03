<?php

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
Route::apiResource("/users", \App\Models\User::class);
Route::get("/users", [\App\Models\User::class, 'index']);
Route::get("/users/{id}", [\App\Models\User::class, 'show']);
Route::post("/users", [\App\Models\User::class, 'store']);
Route::patch("/users/{id}", [\App\Models\User::class, 'update']);
Route::delete("/users/{id}", [\App\Models\User::class, 'destory']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
