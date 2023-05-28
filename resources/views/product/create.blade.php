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
        <h1>Create Product</h1>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="product_sku">Product SKU</label>
                <input type="text" name="product_sku" id="product_sku" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category_id">Product Category</label>
                <select name="product_category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea name="product_description" id="product_description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
