<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryManagerController extends Controller
{
    public function index()
    {
        // Retrieve all categories sorted alphabetically by category name
        $categories = Category::orderBy('category_name')->get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories',
        'description' => 'required',
    ]);

    // Create a new category record
    
    $category = new Category();
    $category->category_name = $validatedData['category_name'];
    $category->description = $validatedData['description'];
    
    $category->save();
    return redirect()->route('category.index')->with('success', 'Category created successfully.');
}




    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate the input
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id,
            'description' => 'required',
        ]);

        // Update the category record
        $category->category_name = $validatedData['category_name'];
        $category->description = $validatedData['description'];
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }
    public function destroy(Category $category)
    {
        // Soft-delete the category record
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
