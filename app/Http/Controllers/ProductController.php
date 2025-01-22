<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  public function index()
  {
    return view('pages.products.catalog');
  }

  public function show()
  {
    return view('pages.products.show');
  }

  public function create()
  {
    return view('pages.products.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'cover' => 'required|image|mimes:png,jpg,jpeg,webp|max:3000',
      'name' => 'required|string|min:2',
      'price' => 'required|numeric|between:0,1000000',
      'description' => 'nullable|string|max:1500',
      // 'product_category_id' => 'required|min:6|string|max:16|confirmed',
    ]);

    if ($request->hasFile('cover')) {
      if (!Storage::disk("public")->exists('images/products')) {
        Storage::disk("public")->makeDirectory('images/products');
      }

      $image = $request->file('cover');
      $filename = uniqid() . '.' . $image->extension();

      Storage::disk("public")->put("images/products/" . $filename, file_get_contents($image));
    }

    Product::create([
      'cover' => $filename,
      'name' => $request->name,
      'price' => $request->price,
      'description' => $request->description,
      'quantity' => 1,
      // 'product_category_id' => $request->product_category_id,
    ]);

    return redirect('/');
  }

  public function edit()
  {
    return view('pages.products.login');
  }

  public function update(Request $request)
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

  public function destroy()
  {
    Auth::logout();
    return redirect('/');
  }
}
