@extends('layouts.master')

@section('content')
    <div class="container my-4">
        <h3>All Categories</h3>
        <a href="{{ route("categories.create") }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add New
        </a>
        <table class="table table-bordered table-hover mt-2">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-sm mr-2" href="{{ route("categories.edit", $category->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route("categories.destroy", $category->id) }}">
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