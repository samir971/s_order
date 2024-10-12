@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>قائمة المستخدمين</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-primary">إضافة مستخدم جديد</a>

    <table class="table">
        <thead>
            <tr>
                <th>اسم</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>العنوان</th>
                <th>النوع</th>
                <th>الحالة</th>
                <th>تاريخ الانتهاء</th>
                <th>الباقة</th>
                <th>المنطقة</th>
                <th>الإجراءات</th> <!-- عمود الأزرار -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->active ? 'نشط' : 'غير نشط' }}</td>
                    <td>{{ $user->expire ? $user->expire->format('Y-m-d') : 'غير محدد' }}</td>
                    <td>{{ $user->package ? $user->package->title : 'لا توجد باقة' }}</td>
                    <td>{{ $user->area ? $user->area->title : 'no area' }}</td>
                    <td>
                       
                        <a href="{{ route('customers.edit', $user->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection