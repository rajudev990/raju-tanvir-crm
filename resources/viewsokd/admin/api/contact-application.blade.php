@extends('admin.layouts.app')

@section('title') Contact Applications Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="card-title text-primary mb-0">Contact Applications Form</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $submission)
                        <tr>
                            <td>{{ ($submission['name'] ?? '') . ' ' . ($submission['field_8d7dadd'] ?? '') }}</td>
                            <td>{{ $submission['email'] ?? '' }}</td>
                            <td>{{ $submission['field_2ecf37b'] ?? '' }}</td>
                            <td>{{ $submission['field_50a29c8'] ?? $submission['field_a381c5e'] ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.contact-applications.view', $index) }}" class="btn btn-sm btn-primary">
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