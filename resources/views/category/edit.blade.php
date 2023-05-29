
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
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $category->description }}</textarea>
            </div>

            <button type="submit" class="add-button">Update</button>
        </form>
    </div>
@endsection
