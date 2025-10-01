@extends('admin.layouts.app')

@section('title') Referral Application Details (Entry #{{ $submission['entry_id'] }}) @endsection


@section('content')


<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Referral Application Details (Entry #{{ $submission['entry_id'] }})</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium"><a href="{{ route('admin.apply-now') }}" class="btn btn-dark btn-sm">Back</a></li>
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
                        <td>{{ $meta['name-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $meta['name-4'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{ $meta['email-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number </th>
                        <td>{{ $meta['phone-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            @if(isset($meta['address-7']) && is_array($meta['address-7']))
                            {{ implode(', ', $meta['address-7']) }}
                            @else
                            {{ $meta['address-7'] ?? '' }}
                            @endif
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
                        <td>{{ $meta['name-38'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Student Last Name</th>
                        <td>{{ $meta['name-39'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>
                            @if(isset($meta['date-1']) && is_array($meta['date-1']))
                                {{ \Carbon\Carbon::createFromDate(
                                    $meta['date-1']['year'] ?? null,
                                    $meta['date-1']['month'] ?? null,
                                    $meta['date-1']['day'] ?? null
                                )->format('m/d/Y') }}
                            @else
                                {{ $meta['date-1'] ?? '' }}
                            @endif
                        </td>

                    </tr>
                    <tr>
                        <th>Preferred Start Date</th>
                        <td>{{ $meta['date-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Country of Residence</th>
                        <td>
                            @if(isset($meta['address-8']) && is_array($meta['address-8']))
                            {{ implode(', ', $meta['address-8']) }}
                            @else
                            {{ $meta['address-8'] ?? '' }}
                            @endif
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
                        <td>{{ $meta['select-3'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>I am interested in learning more about?</th>
                        <td>{{ $meta['checkbox-1'] ?? '' }}</td>
                    </tr>
                    
                    <tr>
                        <th>Please let us know if you have any questions or how our admissions team can help you. Feel free to share more about your child and family</th>
                        <td>{{ $meta['textarea-1'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Please keep me updated on news, events and offers from Al-Rushd</th>
                        <td>{{ $meta['radio-2'] ?? '' }}</td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection