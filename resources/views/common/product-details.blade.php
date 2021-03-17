@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route("common.product-list") }}" class="btn btn-outline-info my-3">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="row">
            <div class="col-md-6">
                <img src="/storage/{{ $product->image }}" width="100%">
            </div>
            <div class="col-md-6">
                <h3>{{ $product->name }}</h3>
                <h5>Category: {{ $product->category->name }}</h5>
                <p>{!! html_entity_decode($product->desc) !!}</p>
                <h4>Price: {{ $product->price }} $</h4>
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form> 
            </div>
        </div>
    </div>
@endsection