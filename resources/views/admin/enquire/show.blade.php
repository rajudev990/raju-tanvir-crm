@extends('admin.layouts.app')

@section('title') Enquire Now Details (Entry #{{ $data->entry_id }}) @endsection


@section('content')


<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Enquire Now Details (Entry #{{ $data->entry_id }})</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium"><a href="{{ route('admin.enquires.index') }}" class="btn btn-dark btn-sm">Back</a></li>
    </ul>
</div>


<div class="container">


    {{-- Parent / Guardian Details --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">Parent / Guardian Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>First Name</th>
                        <td>{{ $data->fname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $data->lname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{ $data->email ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number </th>
                        <td>{{ $data->mobile_number ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            {{ $data->address }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    {{-- Student Details --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">Student Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Student First Name</th>
                        <td>{{ $data->student_fname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Student Last Name</th>
                        <td>{{ $data->student_lname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>
                            {{ $data->student_dob ?? '' }}
                        </td>

                    </tr>
                    <tr>
                        <th>Preferred Start Date</th>
                        <td>{{ $data->student_start_date ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Country of Residence</th>
                        <td>
                           {{ $data->student_country ?? '' }}
                        </td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
    </div>
   
    {{-- Enquiry Details --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">Enquiry Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>What can we help you with?</th>
                        <td>{{ $data->details1 ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>I am interested in learning more about?</th>
                        <td>{{ $data->details2 ?? '' }}</td>
                    </tr>
                    
                    <tr>
                        <th>Please let us know if you have any questions or how our admissions team can help you. Feel free to share more about your child and family</th>
                        <td>{{ $data->details3 ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Please keep me updated on news, events and offers from Al-Rushd</th>
                        <td>{{ $data->details4==1 ? 'Yes' : 'No' }}</td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection