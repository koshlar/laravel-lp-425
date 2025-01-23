<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterLoginController extends Controller
{
  public function create()
  {
    return view('pages.auth.register');
  }

  public function register(Request $request)
  {
    $request->validate([
      'email' => 'required|email|string|unique:users,email',
      'password' => 'required|min:6|string|max:16|confirmed',
    ]);

    User::create([
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'user_role_id' => 2,
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, true)) {
      $request
        ->session()
        ->regenerate();
      return redirect('/');
    }

    return redirect()
      ->back()
      ->withInput()
      ->withErrors(["email" => "Invalid credentials"]);
  }

  public function edit()
  {
    return view('pages.auth.login');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email|string|exists:users,email',
      'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, true)) {
      $request
        ->session()
        ->regenerate();
      return redirect('/');
    }

    return redirect()
      ->back()
      ->withInput()
      ->withErrors(["email" => "Invalid credentials"]);
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
