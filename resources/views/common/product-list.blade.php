@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="py-2">Product List</h2>
        <div class="shop-page">

            <div class="sidebar">
                <ul class="list-group mb-4">
                    <li id="li-cat" class="list-group-item active">
                        Categories
                        <i class="fa fa-angle-down"></i>     
                    </li>
                    
                    @foreach ($allCategories as $cat)
                        <li class="list-group-item">
                            <a href="">{{ $cat->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="products">
                @foreach ($allProducts as $prod)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="/storage/{{ $prod->image }}" height="160px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prod->name }}</h5>
                            <h4 class="card-text">{{ $prod->price }} $</h4>
                            <div class="d-flex">
                                <a href="{{ route("common.product-details", $prod->id) }}" class="btn btn-outline-primary mr-2">Details</a>
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $prod->id }}">
                                    <input type="hidden" name="name" value="{{ $prod->name }}">
                                    <input type="hidden" name="price" value="{{ $prod->price }}">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        
        </div>

        <div class="pagination">
            {{ $allProducts->links() }}
        </div>
    </div>
@endsection