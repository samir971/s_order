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
    <h1>إضافة مستخدم جديد</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mobile">رقم الهاتف</label>
            <input type="text" name="mobile" id="mobile" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">العنوان</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        
        
        <div class="form-group">
            <label for="expire">تاريخ الانتهاء</label>
            <input type="date" name="expire" id="expire" class="form-control">
        </div>
        <div class="form-group">
            <label for="package_id">الباقة</label>
            <select name="package_id" id="package_id" class="form-control">
               
                @foreach($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="area_id">المنطقة</label>
            <select name="area_id" id="area_id" class="form-control">
               
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
    </form>
@endsection