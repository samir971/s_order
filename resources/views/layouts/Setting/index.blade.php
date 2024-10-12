@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">أوقات العمل</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('errors'))
        <div class="alert alert-success">
            {{ session('errors') }}
        </div>
    @endif
    <!-- أوقات العمل -->
    @foreach($workTimes as $workTime)
        <form action="{{ route('worktimes.update') }}" method="POST" class="mb-4">
            @csrf
            @method('PATCH')

            <div class="card border rounded-3 shadow-sm">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $workTime->dateName }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="fromTime{{ $workTime->id }}" class="form-label">من الساعة</label>
                                <input type="time" id="fromTime{{ $workTime->id }}" name="FromTime" class="form-control" value="{{ $workTime->FromTime }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="toTime{{ $workTime->id }}" class="form-label">إلى الساعة</label>
                                <input type="time" id="toTime{{ $workTime->id }}" name="ToTime" class="form-control" value="{{ $workTime->ToTime }}">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $workTime->id }}">
                    </div>
                </div>
                <div class="card-footer bg-light text-end">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
    @endforeach
</div>
@endsection