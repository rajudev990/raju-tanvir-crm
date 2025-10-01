@extends('admin.layouts.app')

@section('title') Job Applications Form @endsection

@section('content')

<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">Application Details</h6>
            <a href="{{ route('admin.job-applications') }}" class="btn btn-primary btn-sm">← Back</a>
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
</div>

@endsection