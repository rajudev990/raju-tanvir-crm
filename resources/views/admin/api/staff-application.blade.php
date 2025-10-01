@extends('admin.layouts.app')

@section('title') Staff Applications Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="card-title text-primary mb-0">Staff Applications Form</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $submission)
                        <tr>
                            <td>{{ $submission['name'] ?? '' }}</td>
                            <td>{{ $submission['email'] ?? '' }}</td>
                            <td>{{ $submission['field_fa1fc8d'] ?? '' }}</td>
                            <td>{{ $submission['field_36f8b56'] ?? '' }}</td>
                            <td>{{ $submission['field_b2dcf7c'] ?? '' }}</td>
                            <td>{{ $submission['field_a068999'] ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.staff-applications.view', $index) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection