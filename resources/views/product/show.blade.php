@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <nav class="centered-nav">
        <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
        <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
        <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
        <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
        
    </nav>
    <h1>Product Details</h1>

    <div>
        <h2>{{ $product->product_name }}</h2>
        <p>SKU: {{ $product->product_sku }}</p>
        <p>Category: {{ $product->category->category_name }}</p>
        <img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image">
        <p>Description: {{ $product->product_description }}</p>
    </div>

    <div class="button-container">
        <a href="{{ route('product.index') }}" class="add-button">Back to Product List</a>
    </div>
@endsection
