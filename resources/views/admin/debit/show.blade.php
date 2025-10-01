@extends('admin.layouts.app')

@section('title') View Debit Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">View - {{ $data->surename }}</h6>
            <a href="{{ route('admin.debit-forms.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <tbody>
                        <tr>
                            <th>Forename</th>
                            <td>{{ $data->forename ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Surename</th>
                            <td>{{ $data->surename ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Personal Country</th>
                            <td>{{ $data->p_country ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Street Address</th>
                            <td>{{ $data->street_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $data->address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $data->city ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $data->state ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Zip/Postal Code</th>
                            <td>{{ $data->zip_code ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Contact Country</th>
                            <td>{{ $data->c_country ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $data->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Confirm Email</th>
                            <td>{{ $data->confirm_email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{ $data->mobile_number ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Bank Information</th>
                            <td>
                                <p class="mb-0">Bank Name : {{ $data->bank_name }}</p>
                                <p class="mb-0">Account Number : {{ $data->account_number }}</p>
                                <p class="mb-0">Sort Code : {{ $data->sort_code }}</p>
                                <p class="mb-0">Debit Date : {{ $data->debit_date }}</p>
                            </td>
                        </tr>

                        <tr>
                            <th>Student Information</th>
                            <td>
                                <p class="mb-0">Child1 : {{ $data->student_name1 }}</p>
                                <p class="mb-0">Group : {{ $data->student_group1 }}</p>
                               @foreach($data->debitstudent as $item)
                                    <p class="mb-0">Child{{ $loop->iteration + 1 }} : {{ $item->student_name }}</p>
                                    <p class="mb-0">Group : {{ $item->student_group }}</p>
                                @endforeach
                               
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
   
</script>

@endsection