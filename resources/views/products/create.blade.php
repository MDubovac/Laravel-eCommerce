@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <a href="{{ route("products.index") }}" class="btn btn-outline-primary mb-3">
            <i class="fa fa-arrow-circle-left"></i> Back
        </a>
        <h3>
            {{ isset($product) ? "Edit Product" : "Create Product"}}
        </h3>
        <form method="POST" action="{{ isset($product) ? route("products.update", $product->id) : route("products.store") }}" enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ isset($product) ? $product->name : "" }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="image">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ isset($product) ? $product->price : "" }}">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (isset($product))
                                @if ($category->id === $product->category_id)
                                    selected
                                @endif
                            @endif
                            >
                            {{ $category->name }}   
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            @if (isset($product))
                <h4>Selected image</h4>
                <img src="/storage/{{ $product->image}}" width="100%">
            @endif

            <div class="form-group">
                <label for="image">Image</label>
                <input class="form-control form-control" id="image" name="image" type="file">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control">{{ isset($product) ? $product->desc : ""}}</textarea>
                @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-primary btn" type="submit">Save Product</button>

        </form>
    </div>    
@endsection