@extends('admin.layouts.app')

@section('title') Staff Applications Form @endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Staff Application Details</h6>
        <a href="{{ route('admin.staff-applications') }}" class="btn btn-dark btn-sm">← Back</a>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($submission as $key => $value)
                @php
                    $label = $labels[$key] ?? ucwords(str_replace('_', ' ', $key));
                @endphp
                <div class="col-md-6 mb-3">
                    <div class="list-group-item">
                        <strong>{{ $label }}:</strong> {{ $value }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection