<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductManagerController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all products with their associated category
        $products = Product::with('category')
        ->orderByDesc('updated_at')
        ->orderByDesc('created_at')
        ->get();

    return view('product.index', compact('products'));
    }

    public function create()
    {
        // Retrieve all categories to populate the category select dropdown in the create form
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
{
    // Validate the input
    $validatedData = $request->validate([
        'product_name' => 'required',
        'product_sku' => 'required|unique:products',
        'product_category_id' => 'required|exists:categories,id',
        'product_description' => 'required',
        'product_image' => 'image|mimes:jpeg,png,jpg|max:2048', // Adjust the allowed image types and maximum size as needed
    ]);

    // Upload the product image if provided
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        $imagePath = $image->store('product_images', 'public');
        $validatedData['product_image'] = $imagePath;
    }

    // Create a new product record
    $product = new Product();
    $product->product_name = $validatedData['product_name'];
    $product->product_sku = $validatedData['product_sku'];
    $product->product_category_id = $validatedData['product_category_id'];
    $product->product_description = $validatedData['product_description'];
    
{
    // Validate the uploaded file
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Retrieve the uploaded image file
    $imageFile = $request->file('image');

    // Generate a unique filename for the image
    $filename = uniqid() . '.' . $imageFile->getClientOriginalExtension();

    // Save the image to the storage directory
    $imageFile->storeAs('public/', $filename);

    // Save the image file path to the database
    // You can associate the image with a specific product or any other relevant entity
    $product = new Product();
    $product->product_image = 'public/' . $filename;
    $product->save();

    // Redirect or perform additional actions
}

    $product->save();

    return redirect()->route('product.index')->with('success', 'Product created successfully.');
}


    public function show(Product $product)
    {
        // Retrieve the full details of a specific product
        $product->load('category');

        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // Retrieve all categories to populate the category select dropdown in the edit form
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    // Validate the input
    $validatedData = $request->validate([
        'product_name' => 'required',
        'product_sku' => 'required|unique:products,product_sku,' . $product->id,
        'product_category_id' => 'required|exists:categories,id',
        'product_description' => 'required',
        'product_image' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Update the product record
    $product->product_name = $validatedData['product_name'];
    $product->product_sku = $validatedData['product_sku'];
    $product->product_category_id = $validatedData['product_category_id'];
    $product->product_description = $validatedData['product_description'];

    // Upload the updated product image if provided
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        $imagePath = $image->store('product_images', 'public');
        $product->product_image = $imagePath;
    }

    $product->save();

    return redirect()->route('product.index')->with('success', 'Product updated successfully.');
}


    public function destroy(Product $product)
    {
        // Soft-delete the product record
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}