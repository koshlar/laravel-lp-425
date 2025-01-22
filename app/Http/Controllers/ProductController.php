<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  public function index()
  {
    return view('pages.products.catalog', ['products' => Product::all()]);
  }

  public function show($id)
  {
    return view('pages.products.show', ['product' => Product::findOrFail($id)]);
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

    return redirect(route('products.index'));
  }

  public function edit($id)
  {
    return view('pages.products.edit', ['product' => Product::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'cover' => 'required|image|mimes:png,jpg,jpeg,webp|max:3000',
      'name' => 'required|string|min:2',
      'price' => 'required|numeric|between:0,1000000',
      'description' => 'nullable|string|max:1500',
      // 'product_category_id' => 'required|min:6|string|max:16|confirmed',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('cover')) {
      if (!Storage::disk("public")->exists('images/products')) {
        Storage::disk("public")->makeDirectory('images/products');
      }

      if (Storage::disk('public')->exists('/images/products' . $product->cover)) {
        Storage::disk('public')->delete('/images/products' . $product->cover);
      }

      $image = $request->file('cover');
      $filename = uniqid() . '.' . $image->extension();

      Storage::disk("public")->put("images/products/" . $filename, file_get_contents($image));
    }

    $product->update([
      'cover' => $filename,
      'name' => $request->name,
      'price' => $request->price,
      'description' => $request->description,
      'quantity' => 1,
      // 'product_category_id' => $request->product_category_id,
    ]);

    return redirect(route('products.index'));
  }

  public function destroy($id)
  {
    $product = Product::findOrFail($id);

    if (Storage::disk('public')->exists('/images/products' . $product->cover)) {
      Storage::disk('public')->delete('/images/products' . $product->cover);
    }

    $product->delete();

    return redirect(route('products.index'));
  }
}
