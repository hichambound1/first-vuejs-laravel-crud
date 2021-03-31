<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('/categorie','CategorieController');
// Route::resource('/produit','ProduitController');
Auth::routes();

Route::get('/categorieslist', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories');
Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'allcats']);
Route::get('/categorie/edit/{id}', [App\Http\Controllers\CategorieController::class, 'edit']);
Route::patch('/categorie/edit/{id}', [App\Http\Controllers\CategorieController::class, 'update']);
Route::delete('/categorie/delete/{id}', [App\Http\Controllers\CategorieController::class, 'destroy']);
Route::post('/addcategorie', [App\Http\Controllers\CategorieController::class,'store'])->middleware('auth');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::delete('/produit/delete/{id}', [App\Http\Controllers\ProduitController::class, 'destroy']);
Route::get('/produitslist', [App\Http\Controllers\ProduitController::class, 'index'])->name('produits');
Route::get('/produit/edit/{id}', [App\Http\Controllers\ProduitController::class, 'edit']);
Route::patch('/produit/edit/{id}', [App\Http\Controllers\ProduitController::class, 'update']);
Route::post('/addproduit', [App\Http\Controllers\ProduitController::class, 'store']);
