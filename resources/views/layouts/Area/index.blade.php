@extends('layouts.app')

@section('title', 'استعراض المناطق')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>قائمة المناطق</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم المنطقة</th>
                        <th>اسم المدينة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                        <tr>
                            <td>{{ $area->title }}</td>
                            <td>{{ $area->city->title }}</td>
                            <td>
                                <a href="{{ route('cities.areas', $area->id) }}" class="btn btn-info btn-sm">تعديل</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection