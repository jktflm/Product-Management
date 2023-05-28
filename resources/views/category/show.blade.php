<!-- resources/views/category/show.blade.php -->

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <nav class="centered-nav">
        <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
        <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
        <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
        <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
    </nav>
<div class="show-category">
    <h1>Category Detail</h1>

    <p><strong>Category Name:</strong> {{ $category->category_name }}</p>
    <p><strong>Category Description:</strong> {{ $category->description }}</p>

    <a href="{{ route('category.index') }}">Back to Category List</a>
</div>
@endsection
