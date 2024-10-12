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
<div class="container">
    <h1>تعديل محافظة</h1>

    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">اسم المحافظة</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $city->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection