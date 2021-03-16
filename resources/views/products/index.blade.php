@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <h3>All Products</h3>
        <a href="{{ route("products.create") }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add New
        </a>
        <table class="table table-bordered mt-2">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody>
               @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <a href="{{ route("products.show", $product->id) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ $product->price . " $"}}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-sm mr-2" href="{{ route("products.edit", $product->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route("products.destroy", $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
@endsection