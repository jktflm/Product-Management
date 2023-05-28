@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<nav class="centered-nav">
    <a href="{{ route('dashboard.index') }}" class="nav-button">Dashboard</a>
    <a href="{{ route('user.index') }}" class="nav-button">User Manager</a>
    <a href="{{ route('category.index') }}" class="nav-button">Category Manager</a>
    <a href="{{ route('product.index') }}" class="nav-button">Product Manager</a>
</nav>

<h1>Dashboard</h1>

<form action="{{ route('dashboard.index') }}" method="GET">
    <label for="category_filter">Category:</label>
    <select name="category" id="category_filter">
        <option value="all" {{ $selectedCategory === 'all' ? 'selected' : '' }}>Show All</option>
        @foreach ($categories as $category)
            @if ($category !== 'all')
                <option value="{{ $category }}" {{ $selectedCategory === $category ? 'selected' : '' }}>{{ $category }}</option>
            @endif
        @endforeach
    </select>

    <label for="sort_filter">Sort By:</label>
    <select name="sort" id="sort_filter">
        <option value="asc" {{ $selectedSort === 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ $selectedSort === 'desc' ? 'selected' : '' }}>Descending</option>
    </select>

    <input type="submit" value="Apply Filters">
</form>

<table>
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td>
                @if ($product->product_image)
                    <img src="{{ $product->product_image }}" alt="Thumbnail" width="50" height="50">
                @else
                    No Thumbnail Available
                @endif
            </td>
            <td>
                <a href="{{ route('dashboard.show', $product->id) }}">{{ $product->product_name }}</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="2">No products found.</td>
        </tr>
    @endforelse
</tbody>
</table>

@if ($selectedCategory !== 'all')
    {{ $products->links() }}
@endif
@endsection
