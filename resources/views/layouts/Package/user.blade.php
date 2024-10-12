@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
       
        <div class="col-md-12">
            
                <div class="float-left d-inline-block">
    <h1>المستخدمين المشتركين في الحزمة: {{ $package->title }}</h1>
</div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>اسم المستخدم</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>العنوان</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">لا يوجد مستخدمين مشتركين في هذه الحزمة</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection