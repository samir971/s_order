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
    <h1>تعديل المستخدم</h1>

    <form action="{{ route('customers.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

       
        <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="اتركه فارغًا إذا لم ترغب في تغيير كلمة المرور">
        </div>
        <div class="form-group">
            <label for="mobile">رقم الهاتف</label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}" required>
        </div>
        <div class="form-group">
            <label for="address">العنوان</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>
        <div class="form-group">
            <label for="notes">ملاحظات</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes', $user->notes) }}</textarea>
        </div>
  
  
    
        <div class="form-group">
            <label for="package_id">الباقة</label>
            <select name="package_id" id="package_id" class="form-control">
                <option value="">لا توجد باقة</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" {{ $package->id == $user->package_id ? 'selected' : '' }}>{{ $package->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="area_id">المنطقة</label>
            <select name="area_id" id="area_id" class="form-control">
                <option value="">لا توجد منطقة</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ $area->id == $user->area_id ? 'selected' : '' }}>{{ $area->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث المستخدم</button>
    </form>
@endsection