@extends('master.dashboard')

@section('title', 'Categories')

@section('content')
@section('header', 'Categories')
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<a class="btn btn-sm btn-primary" href="{{ route('category.create') }}">Add Category</a>
<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Category Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Category_Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($category as $id => $c)
                            <tr>
                                <td>{{ $id + 1 }}</td>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('category.edit', $c->id) }}">Update</a>
                                        </div>

                                        <form method="post" action="{{ route('category.destroy', $c->id) }}">
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

@endsection
