@extends('admin.layouts.app')

@section('title') View Meeting Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">View - {{ $data->name }}</h6>
            <a href="{{ route('admin.metting-form.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $data->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $data->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Guest Email</th>
                            <td>{{ $data->guest_email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $data->location ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>{{ $data->message ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>{{ $data->duration ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $data->date ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{ $data->time ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Time Zone</th>
                            <td>{{ $data->timezone ?? 'N/A' }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
<script>
   
</script>

@endsection