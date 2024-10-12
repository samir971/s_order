@extends('layouts.app')

@section('title', 'تعديل المنطقة')

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
                    <h3 class="card-title">تعديل المنطقة</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('areas.update', $area->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">اسم المنطقة:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $area->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city_id">المدينة:</label>
                            <select name="city_id" id="city_id" class="form-control" required>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                     {{ $area->city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                            <a href="{{ route('areas') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection