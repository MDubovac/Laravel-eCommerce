@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Products Page</h2>
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group">
                    <li class="list-group-item">2121</li>
                    <li class="list-group-item">2121</li>
                    <li class="list-group-item">2121</li>
                    <li class="list-group-item">2121</li>
                </ul>
            </div>
            <div class="col-md-10">
               <div class="row">
                    @foreach ($allProducts as $product)
            
                        <div class="col-md-4">
                            <div class="product">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="/storage/{{ $product->image }}" alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $product->name }}</h5>
                                      <p class="card-text">
                                          {!! html_entity_decode($product->desc) !!}
                                      </p>
                                      <div class="card-bot">
                                        <h4>{{ $product->price }} $</h4>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>

                    @endforeach
               </div>
            </div>
        </div>
    </div>
@endsection