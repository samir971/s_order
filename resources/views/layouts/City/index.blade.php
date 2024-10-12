@extends('layouts.app')

@section('content')
<div class="container">
    <h1>المحافظات</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->title }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning">تعديل</a>
                        
                    </td>
                    <td>
                        <a href="{{ route('cities.areas', $city->id) }}" class="btn btn-warning">المناطق</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection