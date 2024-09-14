<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/main', function () {
    return view('main');
});

Route::get('/home', [HomeController::class, 'home']);
Route::get('/register', [AuthController::class, 'daftar']);
Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/data-table', function () {
    return view('data_table');
});
Route::get('/table', function () {
    return view('table');
});
Route::middleware(['auth'])->group(function () {
Route::get('category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/games/create', [GameController::class, 'create']);
Route::post('/games', [GameController::class, 'store']);
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{id}', [GameController::class, 'show']);
Route::get('/games/{id}/edit', [GameController::class, 'edit']);
Route::put('/games/{id}', [GameController::class, 'update']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);

Route::get('/', [BooksController::class, 'index']);

});
Route::resource('/news', NewsController::class);
Route::resource('/books', BooksController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
