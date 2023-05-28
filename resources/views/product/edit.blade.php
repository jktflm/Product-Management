@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<nav class="centered-nav">
    <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
    <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
    <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
    <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
</nav>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>

            <div class="form-group">
                <label for="product_sku">Product SKU</label>
                <input type="text" name="product_sku" id="product_sku" class="form-control" value="{{ $product->product_sku }}" required>
            </div>

            <div class="form-group">
                <label for="product_category_id">Product Category</label>
                <select name="product_category_id" id="product_category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="product_description" class="form-control" required>{{ $product->product_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control-file">
            </div>

            <button type="submit" class="add-button">Update</button>
        </form>
    </div>
@endsection
