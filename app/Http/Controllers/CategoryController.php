<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('products')->get();
        return view('categories.index', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category', $category));
    }

    public function store(Request $request)
    {
        $dataCategory = $request->validate([
            'name' => 'required|string|unique:categories,',
        ]);

        Category::create($dataCategory);

        return redirect()->route('category.index')
                         ->with('success', 'Category have been Created');
    }

    public function update(Request $request, Category $category)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories, name,' . $category->id,

        ]);

        $category->update($validatedData);

        return redirect()->route('category.index')
                         ->with('success', 'Category have been Updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category have been Deleted.');
    }

}
