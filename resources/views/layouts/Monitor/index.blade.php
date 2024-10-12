
@extends('layouts.app')

@section('content')
    <h1>مسؤولي التسويق</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>الهاتف</th>
                <th>العنوان</th>
                <th>المناطق المشرف عليها</th>
                
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monitors as $monitor)
                <tr>
                    <td>{{ $monitor->name }}</td>
                    <td>{{ $monitor->email }}</td>
                    <td>{{ $monitor->mobile }}</td>
                    <td>{{ $monitor->address }}</td>
                    
                    <td>
                        @foreach ($monitor->areas as $area)
                           
                            {{$area->title}}@if (!$loop->last), @endif
                                
                          
                            
                        @endforeach
                        </td>
                    <td>
                        <a href="{{ route('monitors.edit', $monitor) }}" class="btn btn-warning" >تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection