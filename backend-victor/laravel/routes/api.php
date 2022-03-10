<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\ProductosController;
use App\Http\Controllers\v1\CategoriasController;
use App\User;

use App\Http\Controllers\v2\SeguridadController;



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



    Route::get("/v1/productos",[ProductosController::class,"getAll"]);
    Route::get("/v1/productos/{id}",[ProductosController::class,"getItem"]);
    Route::post("/v1/productos",[ProductosController::class,"store"]);
    Route::put("/v1/productos",[ProductosController::class,"update"]);
    Route::patch("/v1/productos",[ProductosController::class,"patch"]);
    Route::delete("/v1/productos/{id}",[ProductosController::class,"delete"]);

    Route::get("/v1/categorias",[CategoriasController::class,"getAll"]);
    Route::get("/v1/categorias/{id}",[CategoriasController::class,"getItem"]);
    Route::post("/v1/categorias",[CategoriasController::class,"store"]);
    Route::put("/v1/categorias",[CategoriasController::class,"update"]);
    Route::patch("/v1/categorias",[CategoriasController::class,"patch"]);
    Route::delete("/v1/categorias/{id}",[CategoriasController::class,"delete"]);

    Route::get("/v1/seguridad/usuarios",[SeguridadController::class,"getAll"]);
    Route::get("/v1/seguridad/usuarios/{id}",[SeguridadController::class,"getItem"]);
    Route::post("/v1/seguridad/usuarios",[SeguridadController::class,"store"]);
    Route::put("/v1/seguridad/usuarios",[CategoriasController::class,"update"]);
    Route::patch("/v1/seguridad/usuarios",[CategoriasController::class,"patch"]);
    Route::delete("/v1/seguridad/usuarios/{id}",[CategoriasController::class,"delete"]);    

Route::post("/v1/seguridad/login",[SeguridadController::class,"login"]);


