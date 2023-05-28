<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    // Get the selected category filter
    $selectedCategory = $request->input('category', 'all');

    // Get the selected sort filter
    $selectedSort = $request->input('sort', 'asc');

    // Retrieve all active products with their categories
    $query = Product::query()->with('category')->where('status', 'active');

    // Apply category filter if not "all"
    if ($selectedCategory !== 'all') {
        $query->whereHas('category', function ($query) use ($selectedCategory) {
            $query->where('category_name', $selectedCategory);
        });
    }

    // Apply sort filter
    $query->orderBy('product_name', $selectedSort);

    // Retrieve the products based on the filters
    $products = $query->paginate(10)->appends(['category' => $selectedCategory, 'sort' => $selectedSort]);

    // Get all categories for the category filter dropdown
    $categories = Category::pluck('category_name')->unique();

    return view('dashboard.index', compact('products', 'categories', 'selectedCategory', 'selectedSort'));
}





    public function show(Product $product)
    {
        // Retrieve the full details of a specific product
        return view('dashboard.show', compact('product'));
    }
}
