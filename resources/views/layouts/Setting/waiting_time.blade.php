<!-- resources/views/settings/waiting_time.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">إعداد فترة السماح</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="waitingTime">فترة السماح (بالدقائق)</label>
                            <input type="number" id="waitingTime" name="waitingTime" class="form-control" value="{{ $setting->waitingTime ?? 0 }}" min="1" step="1" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection