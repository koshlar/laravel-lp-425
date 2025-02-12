<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  public function index(Request $request)
  {
    $products = Product::query();

    $product_category_id = $request->input('pci');
    if (isset($product_category_id)) {
      $products->where('product_category_id', $product_category_id);
    }
    return view('pages.products.index', ['products' => $products->get(), 'productCategories' => ProductCategory::all()]);
  }

  public function show($id)
  {
    return view('pages.products.show', ['product' => Product::findOrFail($id)]);
  }

  public function create()
  {
    return view('pages.products.create', ['productCategories' => ProductCategory::all()]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'cover' => 'required|image|mimes:png,jpg,jpeg,webp|max:3000',
      'name' => 'required|string|min:2',
      'price' => 'required|numeric|between:0,1000000',
      'description' => 'nullable|string|max:1500',
      'product_category_id' => 'required|string|exists:product_categories,id',
    ]);

    if ($request->hasFile('cover')) {
      Storage::disk("public")->makeDirectory('images/products');

      $filename = basename(Storage::disk("public")->put("images/products/", file_get_contents($request->file('cover'))));
    }

    Product::create([
      'cover' => $filename,
      'name' => $request->name,
      'price' => $request->price,
      'description' => $request->description,
      'count' => 1,
      'product_category_id' => $request->product_category_id,
    ]);

    return redirect(route('products.index'));
  }

  public function edit($id)
  {
    return view('pages.products.edit', ['product' => Product::findOrFail($id), 'productCategories' => ProductCategory::all()]);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'cover' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:3000',
      'name' => 'required|string|min:2',
      'price' => 'required|numeric|between:0,1000000',
      'description' => 'nullable|string|max:1500',
      'product_category_id' => 'required|string|exists:product_categories,id',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('cover')) {
      Storage::disk("public")->makeDirectory('images/products');
      // if (!Storage::disk("public")->exists('images/products')) {
      //   Storage::disk("public")->makeDirectory('images/products');
      // }

      if (Storage::disk('public')->exists('images/products/' . $product->cover)) {
        Storage::disk('public')->delete('images/products/' . $product->cover);
      }

      $filename = basename(Storage::disk("public")->put("images/products/", file_get_contents($request->file('cover'))));

      $product->update(['cover' => $filename]);
    }

    $product->update([
      'name' => $request->name,
      'price' => $request->price,
      'description' => $request->description,
      'count' => 1,
      'product_category_id' => $request->product_category_id,
    ]);

    return redirect(route('products.index'));
  }

  public function destroy($id)
  {
    $product = Product::findOrFail($id);

    if (Storage::disk('public')->exists('images/products/' . $product->cover)) {
      Storage::disk('public')->delete('images/products/' . $product->cover);
    }

    $product->delete();

    return redirect(route('products.index'));
  }
}
