@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<nav class="centered-nav">
    <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
    <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
    <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
    <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
</nav>
<div class="show-product">
    <h1>Product Details</h1>
    <h2>{{ $product->product_name }}</h2>
    <p>{{ $product->product_description }}</p>
    <img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image">
    <p></p>
    <a href="{{ route('dashboard.index') }}" class="add-button" >Back to Dashboard</a>
</div>

@endsection
