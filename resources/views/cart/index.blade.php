@extends('layouts.app')

@section('content')
<div class="container py-2">
    <h2 class="py-3">Shopping Cart</h2>
    @if (\Cart::count() > 0)
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            @if (session()->has('cart-success'))
                <div class="alert alert-success">
                    {{ session()->get('cart-success') }}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach (Cart::content() as $item)
                   <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> 
                                <img class="media-object mr-2" src="/storage/{{ $item->model->image}}" width="100px" height="60px"> 
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{ $item->model->name}}</a></h4>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="exampleInputEmail1" value="{{ $item->model->count() }}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{ $item->model->price }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{ $item->model->price }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <form action="/cart/{{ $item->rowId }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>${{ Cart::subtotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>${{ Cart::tax() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>${{ Cart::total() }}</strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <div class="row pb-5">
                <div class="col-md-6">
                    <a href="{{ route("common.product-list") }}" class="btn btn-outline-primary btn-block">Continue Shopping</a>
                </div>

                <div class="col-md-6">
                    <a href="#" class="btn btn-primary btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @else    
        <h3>Your cart is empty</h3>
        <a href="{{ route("common.product-list")}}" class="btn btn-primary">Shop Now</a>
    @endif
</div>
@endsection