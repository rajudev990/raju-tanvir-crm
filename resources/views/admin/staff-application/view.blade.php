@extends('admin.layouts.app')

@section('title') View Application Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">View - {{ $data->job_applied_for }}</h6>
            <a href="{{ route('admin.staff-applications-form.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <tbody>
                        <tr>
                            <th>Job Applied For</th>
                            <td>{{ $data->job_applied_for ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Forename</th>
                            <td>{{ $data->forename ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Middle Names</th>
                            <td>{{ $data->middle_names ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>{{ $data->surname ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Preferred Name</th>
                            <td>{{ $data->preferred_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $data->date_of_birth ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $data->gender ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Marital Status</th>
                            <td>{{ $data->marital_status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td>{{ $data->nationality ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>{{ $data->religion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{ $data->mobile_number ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Home Telephone</th>
                            <td>{{ $data->home_telephone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Street Address</th>
                            <td>{{ $data->street_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Address Line 2</th>
                            <td>{{ $data->address_line_2 ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $data->city ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>County / State / Region</th>
                            <td>{{ $data->county_state_region ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Zip / Postal Code</th>
                            <td>{{ $data->zip_postal_code ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $data->country ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Eligible to work in UK?</th>
                            <td>{{ $data->uk_work ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>DBS Status</th>
                            <td>{{ $data->dbs ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Profile Information</th>
                             <td>
                                <a href="{{ Storage::url($data->profile_photo)}}" target="_blank" class="btn btn-primary btn-sm">Photo</a>
                                <a href="{{ Storage::url($data->prof_of_id)}}" target="_blank" class="btn btn-primary btn-sm">Prof ID</a>
                                <a href="{{ Storage::url($data->prof_of_address)}}" target="_blank" class="btn btn-primary btn-sm">Prof Address</a>
                                <a href="{{ Storage::url($data->certificated)}}" target="_blank" class="btn btn-primary btn-sm">Certificated</a>
                                <a href="{{ Storage::url($data->dbs_one)}}" target="_blank" class="btn btn-primary btn-sm">DBS</a>
                                <a href="{{ Storage::url($data->cv)}}" target="_blank" class="btn btn-primary btn-sm">CV</a>
                            </td>
                        </tr>
                        
                       
                        <tr>
                            <th>Bank Information</th>
                            <td>
                                @if($data->bank_type=='international')
                                <p>Bank Type : {{ $data->bank_type }}</p>
                                <p>Account Name : {{ $data->international_account_name ?? 'N/A' }}</p>
                                <p>Bank Name : {{ $data->international_bank_name ?? 'N/A' }}</p>
                                <p>Account Number : {{ $data->international_account_number ?? 'N/A' }}</p>
                                <p>Swift Code : {{ $data->swift_code ?? 'N/A' }}</p>
                                <p>Branch : {{ $data->branch ?? 'N/A' }}</p>
                                <p>Branch Code : {{ $data->branch_code ?? 'N/A' }}</p>
                                @else
                                <p>Bank Type : {{ $data->bank_type }}</p>
                                <p>Account Name : {{ $data->uk_account_name ?? 'N/A' }}</p>
                                <p>Bank Name : {{ $data->uk_bank_name ?? 'N/A' }}</p>
                                <p>Account Number : {{ $data->uk_account_number ?? 'N/A' }}</p>
                                <p>Sort Code : {{ $data->sort_code ?? 'N/A' }}</p>
                                @endif
                            </td>
                        </tr>


                        <tr>
                            <th>Emergency Contact Forename</th>
                            <td>{{ $data->emergency_forename ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Emergency Contact Surname</th>
                            <td>{{ $data->emergency_surname ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                 @if ($data->status == 1)
                                    <span class="badge bg-success">Approved</span>
                                @elseif ($data->status == 2)
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-primary">Pending</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td>
                                <a href="javascript:void(0);" 
                                class="btn btn-sm btn-success status-btn" 
                                data-id="{{ $data->id }}" 
                                data-status="1">Approved</a>

                                <a href="javascript:void(0);" 
                                class="btn btn-sm btn-danger status-btn" 
                                data-id="{{ $data->id }}" 
                                data-status="2">Rejected</a>

                                <a href="javascript:void(0);" 
                                class="btn btn-sm btn-primary status-btn" 
                                data-id="{{ $data->id }}" 
                                data-status="0">Pending</a>

                            </td>
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
    $(document).ready(function() {
        $('.status-btn').click(function() {
            var id = $(this).data('id');
            var status = $(this).data('status');

            $.ajax({
                url: "{{ route('admin.staff-applications-form.status.update') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload(); // Or update status text dynamically
                    }
                },
                error: function() {
                    alert('Something went wrong.');
                }
            });
        });
    });
</script>

@endsection