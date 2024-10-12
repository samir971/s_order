@extends('layouts.app')

@section('title', 'إضافة منطقة')

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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة منطقة جديدة</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('areas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">اسم المنطقة</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="أدخل اسم المنطقة" required>
                        </div>
                        <div class="form-group">
                            <label for="city_id">اختر المدينة</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">إضافة</button>
                        <a href="{{ route('areas') }}" class="btn btn-secondary">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection