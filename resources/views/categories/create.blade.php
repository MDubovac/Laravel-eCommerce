@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <a href="{{ route("categories.index")}}" class="btn btn-outline-primary btn-sm mb-3">< Back</a>
        <h3>
            {{ isset($category) ? "Edit Category" : "Create Category" }}
        </h3>
        <form action="{{ isset($category) ? route("categories.update", $category->id) : route("categories.store") }}" method="POST">
            @csrf
            @if (isset($category))
                @method("PUT")
            @endif

            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Category name here..." value="{{ isset($category) ? $category->name : ""}}">
                @error('name') 
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
@endsection