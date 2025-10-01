@extends('admin.layouts.app')

@section('title') Apply Now Form @endsection

@section('content')

<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="card-title text-primary mb-0">Apply Now Form</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0" id="dataTable" data-page-length='10'>
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Mobile</th>
                            <th>Work in UK?</th>
                            <th>DBS Cleared?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $submission)
                        <tr>
                            <td>{{ $submission['name'] ?? '' }}</td>
                            <td>{{ $submission['email'] ?? '' }}</td>
                            <td>{{ $submission['field_581eed7'] ?? '' }}</td>
                            <td>{{ $submission['field_2ecf37b'] ?? '' }}</td>
                            <td>{{ $submission['field_1020b20'] == 'on' ? 'Yes' : 'No' }}</td>
                            <td>{{ $submission['field_7e5e6c5'] == 'on' ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.apply-now.view', $index) }}" class="btn btn-sm btn-primary">
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