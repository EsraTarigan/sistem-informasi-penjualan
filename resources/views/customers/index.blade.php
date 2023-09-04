@extends('master.dashboard')


@section('title', 'Customer')

@section('content')
@section('header', 'Customers')
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('customers.create') }}">Add Customer</a>
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
                                <th>addres</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $id => $customer)
                                <tr>
                                    <td>{{ $id + 1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="pr-3">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('customers.edit', $customer->id) }}">Update</a>
                                            </div>

                                            <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
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
