<?php

use App\Http\Controllers\Auth\RegisterLoginController;
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

Route::get('/', function () {
  return view('pages.home');
});

Route::controller(RegisterLoginController::class)
  ->group(
    function () {
      Route::get('/register', 'create');
      Route::post('/register', 'register')->name('register');

      Route::get('/login', 'edit');
      Route::post('/login', 'login')->name('login');
    }
  );
