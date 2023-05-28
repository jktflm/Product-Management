<!-- resources/views/category/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Category Detail</h1>

    <p><strong>Category Name:</strong> {{ $category->category_name }}</p>
    <p><strong>Category Description:</strong> {{ $category->description }}</p>

    <a href="{{ route('category.index') }}">Back to Category List</a>
@endsection
