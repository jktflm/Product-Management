@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_description">Category Description</label>
            <textarea name="category_description" id="category_description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
