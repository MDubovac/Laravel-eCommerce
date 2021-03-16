@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <a href="{{ route("products.index") }}" class="btn btn-outline-primary mb-2">
            <i class="fa fa-arrow-circle-left"></i> Back
        </a>
        
        <div class="row">
            <div class="col-md-4">
                <h3><strong>Name: </strong>{{ $product->name }}</h3>
                <div>
                    <h5><strong>Price: </strong>{{ $product->price }} $</h5>
                    <h5><strong>Category: </strong>{{ $product->category->name }}</h5>
                    <h5><strong>Description:</strong></h5>
                    <p>
                        {!! html_entity_decode($product->desc) !!}
                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <img src="/storage/{{ $product->image}}" width="100%" alt="">
            </div>
        </div>
        

    </div>
@endsection