<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterLoginController extends Controller
{
  public function create()
  {
    return view('pages.register');
  }

  public function register(Request $request)
  {
    dd($request);
  }

  public function edit()
  {
    return view('pages.login');
  }

  public function login() {}
}
