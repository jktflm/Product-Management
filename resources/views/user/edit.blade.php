<!-- resources/views/user/edit.blade.php -->

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
    <h1>Edit User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        <button type="submit" class="add-button">Update</button>
    </form>
</div>
@endsection
