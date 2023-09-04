<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', [
            'products' => $products,
        ]);
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $dataProducts = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        Product::create($dataProducts);

        return redirect()->route('products.index')
            ->with('success', 'Products have been created');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Products have been Updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product have been Deleted.');
    }
}
