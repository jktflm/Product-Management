@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <nav class="centered-nav">
        <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
        <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
        <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
        <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
        
    </nav>

        <h1>Product List</h1>

        

        <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product SKU</th>
                <th>Product Category</th>
                <th>Product Description</th>
                <th>Product Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_sku }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->product_description }}</td>
                    <td><img src="{{ asset('storage/'.$product->product_image) }}" alt="Product Image"></td>
                    <td>
                        <a href="{{ route('product.show', $product->id) }}">View</a>
                        <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button-container">
    <a href="{{ route('product.create') }}" class="add-button">Add Product</a>
        </div>
    
@endsection
