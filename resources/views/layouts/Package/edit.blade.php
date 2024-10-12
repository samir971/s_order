@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <h1>{{ isset($package) ? 'Edit Package' : 'Add New Package' }}</h1>

    <form action="{{ isset($package) ? route('packages.update', $package->id) : route('packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($package))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $package->title ?? old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if (isset($package) && $package->image)
                <img src="{{ asset('images/packages/' . $package->image) }}" width="100" height="100">
            @endif
        </div>

        <div class="form-group">
            <label for="count_of_order">Order Count</label>
            <input type="number" name="count_of_order" class="form-control" value="{{ $package->count_of_order ?? old('count_of_order') }}" required>
        </div>

        <div class="form-group">
            <label for="package_price">Package Price</label>
            <input type="text" name="package_price" class="form-control" value="{{ $package->package_price ?? old('package_price') }}" required>
        </div>

        <div class="form-group">
            <label for="order_price">Order Price</label>
            <input type="text" name="order_price" class="form-control" value="{{ $package->order_price ?? old('order_price') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($package) ? 'Update Package' : 'Add Package' }}</button>
    </form>
@endsection