<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TypesController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//criar
Route::post('/products/new',[ProductsController::class,'store']);
Route::get('/products/new',[ProductsController::class,'create']);
// listagem (página de index)
Route::get('/products',[ProductsController::class,'index']);
//edição
Route::get('/products/update/{id}', [ProductsController::class, 'edit']);
Route::post('/products/update/', [ProductsController::class, 'update']);
// excluir
Route::get('/products/delete/{id}', [ProductsController::class,'destroy']);

// criar tipos
Route::post('/types/new',[TypesController::class,'store_types']);
Route::get('/types/new/', [TypesController::class,'create_types']);

// listagem (página de index) dos tipos
Route::get('/types',[TypesController::class,'index']);

//edição
Route::get('/types/update/{id}', [TypesController::class, 'edit']);
Route::post('/types/update/', [TypesController::class, 'update']);

// excluir
Route::get('/types/delete/{id}', [TypesController::class,'destroy']);