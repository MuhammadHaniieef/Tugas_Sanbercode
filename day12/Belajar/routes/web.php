<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/register', [AuthController::class, 'daftar']);
Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/data-table', function () {
    return view('data_table');
});
Route::get('/table', function () {
    return view('table');
});
Route::get('category/tambah', [CategoryController::class, 'store']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);