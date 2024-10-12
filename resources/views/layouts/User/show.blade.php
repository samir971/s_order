@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تفاصيل المستخدم</h1>

    <table class="table">
        <tr>
            <th>الاسم</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>البريد الإلكتروني</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>الهاتف</th>
            <td>{{ $user->mobile }}</td>
        </tr>
        <tr>
            <th>نوع المستخدم</th>
            <td>{{ $user->type }}</td>
        </tr>
        <tr>
            <th>تاريخ التسجيل</th>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
        </tr>
    </table>
    
    <a href="{{ route('customers', $user->id) }}" class="btn btn-primary">عودة </a>
    <a href="{{ route('customers.edit', $user->id) }}" class="btn btn-primary">تعديل</a>

   
</div>
@endsection