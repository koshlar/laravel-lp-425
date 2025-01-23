<?php

use App\Http\Controllers\Auth\RegisterLoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', function () {
  return view('pages.home');
});

// Routes group для обработки авторизации 
Route::controller(RegisterLoginController::class)
  ->group(
    function () {
      Route::middleware('guest')->group(function () {
        // Route для страницы регистрации
        Route::get('/register', 'create');
        // Route для регистрации
        Route::post('/register', 'register')->name('register');

        // Route для страницы входа
        Route::get('/login', 'edit');
        // Route для входа
        Route::post('/login', 'login')->name('login');
      });

      Route::middleware('auth')->group(function () {
        // Route для выхода
        Route::post('/logout', 'logout')->name('logout');
      });
    }
  );

Route::resource('products', ProductController::class)
  ->except(['index', 'show'])
  ->middleware('admin');

Route::controller(ProductController::class)
  ->prefix('products')
  ->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/{product}', 'show')->name('products.show');
  });
