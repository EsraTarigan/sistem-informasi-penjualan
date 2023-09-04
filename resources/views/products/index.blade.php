@extends('master.dashboard')


@section('title', 'Products')

@section('content')
@section('header', 'Products')
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">Add Product</a>
<div class="container">
    <div class="row py-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $id => $product)
                                <tr>
                                    <td>{{ $id + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rp. {{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="pr-3">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('products.edit', $product->id) }}">Update</a>
                                            </div>

                                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
