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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
    <h1>إضافة مسؤول تسويق جديد</h1>

    <form action="{{ route('monitors.store') }}" method="POST">
        @csrf

        <div>
            <label for="name" class="form-label">الاسم:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div>
            <label for="email" class="form-label">البريد الإلكتروني:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div>
            <label for="password" class="form-label">كلمة المرور:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div>
            <label for="mobile" class="form-label">رقم الهاتف:</label>
            <input type="text" class="form-control" name="mobile" id="mobile" required>
        </div>
        <div>
            <label for="mobile" class="form-label">العنوان</label>
            <input type="text" class="form-control" name="address" id="address" required>
        </div>

        <div>
            <label for="area_ids" class="form-label">المنطقة:</label>
            <select name="area_ids[]" class="form-control" id="area_ids" multiple required>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->title }}</option>
                @endforeach
            </select>
        </div>
<br>
        <button type="submit" class="btn btn-primary">إضافة</button>
        
    </form>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('#area_ids').select2();
    });
</script>
</div>
</div>
</div>
</div>
</div>
@endSection