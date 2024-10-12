@extends('layouts.app')

@section('content')
    <h1>المراسلين</h1>
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
                <th>المشرف المسؤول</th>
                <th>المناطق الني يعمل بها</th>
                

                
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->name }}</td>
                    <td>{{ $delivery->email }}</td>
                    <td>{{ $delivery->mobile }}</td>
                    <td>{{ $delivery->address }}</td>
                    <td>
                        @foreach ($delivery->monitors as $monitor)
                           
                       {{$monitor->user->name}}@if (!$loop->last), @endif
                                
                          
                            
                        @endforeach
                        </td>
                    
                    <td>
                        @foreach ($delivery->areas as $area)
                           
                            {{$area->title}}@if (!$loop->last), @endif
                                
                          
                            
                        @endforeach
                   
                        </td>
                    <td>
                        <a href="{{ route('deliveries.edit', $delivery->id) }}" class="btn btn-warning" >تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection