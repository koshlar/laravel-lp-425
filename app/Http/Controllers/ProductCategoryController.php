<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
  public function index()
  {
    return view('pages.product-categories.index', ['productCategories' => ProductCategory::all()]);
  }

  public function create()
  {
    return view('pages.product-categories.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|min:2',
    ]);

    ProductCategory::create([
      'name' => $request->name,
    ]);

    return redirect(route('product-categories.index'));
  }

  public function edit($id)
  {
    return view('pages.product-categories.edit', ['product-category' => ProductCategory::findOrFail($id)]);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string|min:2',
    ]);

    $productCategory = ProductCategory::findOrFail($id);

    $productCategory->update([
      'name' => $request->name,
    ]);

    return redirect(route('product-categories.index'));
  }

  public function destroy($id)
  {
    $productCategory = ProductCategory::findOrFail($id);

    $productCategory->delete();

    return redirect(route('product-categories.index'));
  }
}
