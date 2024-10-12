@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>تعديل السفير</h1>
    <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $delivery->user->name }}" required>
        </div>

        <div>
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $delivery->user->email }}" required>
        </div>

        <div>
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div>
            <label for="mobile" class="form-label">mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $delivery->user->mobile }}" required>
        </div>
        <div>
            <label for="mobile" class="form-label">address</label>
            <input type="text" class="form-control" name="address" id="mobile" value="{{ $delivery->user->address }}" required>
        </div>
        <div>
            <label for="area_id" class="form-label">area</label>
            <select name="area_id[]" class="form-control" id="area_id" multiple required>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}"
                        {{in_array($area->id, $delivery->area->pluck('id')->toArray()) ? 'selected' : ''  }}>
                        {{ $area->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="monitors_id" class="form-label">area</label>
            <select name="monitors_id[]" class="form-control" id="monitors" multiple required>
                @foreach($monitors as $monitor)
                    <option value="{{ $monitor->id }}"
                        {{in_array($monitor->id, $delivery->monitors->pluck('id')->toArray()) ? 'selected' : ''  }}>
                        {{ $monitor->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
       

<br>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection