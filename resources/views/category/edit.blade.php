<!-- resources/views/category/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
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

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
