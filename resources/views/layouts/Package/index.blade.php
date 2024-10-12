@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Packages</h1>
    <a href="{{ route('packages.create') }}" class="btn btn-primary">Add New Package</a>
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Order Count</th>
                <th>Package Price</th>
                <th>Order Price</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->title }}</td>
                    <td>
                        @if ($package->image)
                            <img src="{{ asset('images/packages/' . $package->image) }}" width="50" height="50">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $package->count_of_order }}</td>
                    <td>{{ $package->package_price }}</td>
                    <td>{{ $package->order_price }}</td>
                    <td> <a href="{{ route('packages.users',$package->id)}}" class="btn btn-primary">show </a>
                    <td>
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection