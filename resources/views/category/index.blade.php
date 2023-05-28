@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <nav class="centered-nav">
        <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
        <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
        <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
        <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
        
    </nav>

        <h1>Category Manager</h1>

        

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('category.show', $category) }}" class="add-button">View</a>
                            <a href="{{ route('category.edit', $category) }}" class="add-button">Edit</a>
                            <form action="{{ route('category.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="button-container">
    <a href="{{ route('category.create') }}" class="add-button">Create Category</a>
        </div>
@endsection
