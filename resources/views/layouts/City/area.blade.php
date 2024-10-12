@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
       
        <div class="col-md-12">
            
                <div class="float-left d-inline-block">
    <h1>المناطق  في المدينه</h1>
</div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>اسم المنطققة</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse($areas as $area)
                <tr>
                    <td>{{ $area->title }}</td>
                
                </tr>
            @empty
                <tr>
                    <td colspan="4">لا يوجد مناطق متاحة في هذه المدينه</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection