@extends('admin.layouts.app')

@section('title') Online Madrasah (Entry #{{ $submission['entry_id'] }}) @endsection


@section('content')


<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Online Madrasah (Entry #{{ $submission['entry_id'] }})</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium"><a href="{{ route('admin.apply-now') }}" class="btn btn-dark btn-sm">Back</a></li>
    </ul>
</div>


<div class="container">
    
    @foreach([1,2,3] as $i)
        <div class="card mb-5 shadow-sm">
            <div class="card-header bg-primary text-white">
                Student {{ $i }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $meta["name-" . ($i==1 ? "2" : ($i==2 ? "21" : "31"))] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Middle Name</th>
                            <td>{{ $meta["name-" . ($i==1 ? "3" : ($i==2 ? "20" : "33"))] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>{{ $meta["name-" . ($i==1 ? "4" : ($i==2 ? "22" : "32"))] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Year</th>
                            <td>{{ $meta["select-" . ($i==1 ? "1" : ($i==2 ? "5" : "9"))] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{ $meta["date-" . $i] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $meta["radio-" . ($i==1 ? "1" : ($i==2 ? "3" : "13"))] ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ is_array($meta["address-" . ($i==1 ? "3" : ($i==2 ? "2" : "4"))] ?? null) ? ($meta["address-" . ($i==1 ? "3" : ($i==2 ? "2" : "4"))]['country'] ?? '') : '' }}</td>
                        </tr>
                        <tr>
                            <th>Proof of ID</th>
                            <td>
                                @php
                                    $uploadKey = "upload-" . ($i==1 ? "1" : ($i==2 ? "8" : "12"));
                                    $file = $meta[$uploadKey]['file'] ?? null;
                                @endphp
                                @if($file)
                                    <a href="{{ $file['file_url'] ?? '#' }}" target="_blank" class="text-primary">{{ $file['file_name'] ?? 'View File' }}</a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Previous Academic Years Progress Report</th>
                            <td>
                                @php
                                    $uploadKey = "upload-" . ($i==1 ? "5" : ($i==2 ? "11" : "13"));
                                    $files = $meta[$uploadKey]['file']['file_url'] ?? [];
                                    if(!is_array($files)) $files = [$files];
                                @endphp
                                @foreach($files as $url)
                                    @if($url)
                                        <a href="{{ $url }}" target="_blank" class="text-primary">{{ basename($url) }}</a><br>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach

    {{-- GUARDIAN --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">1st Guardian Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Title</th>
                        <td>{{ $meta['select-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $meta['name-24'] ?? '' }} {{ $meta['name-25'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Relationship to Students(s)</th>
                        <td>{{ $meta['select-3'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            @if(isset($meta['address-1']) && is_array($meta['address-1']))
                                {{ implode(', ', $meta['address-1']) }}
                            @else
                                {{ $meta['address-1'] ?? '' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $meta['email-1'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Confirm Email</th>
                        <td>{{ $meta['email-1'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{ $meta['phone-2'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Home Telephone</th>
                        <td>{{ $meta['phone-1'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Work Number</th>
                        <td>{{ $meta['name-15'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Proof of ID</th>
                        <td>
                            @if(isset($meta['upload-16']['file']))
                                @php
                                    $file = $meta['upload-16']['file'];
                                @endphp
                                <a href="{{ $file['file_url'] ?? '#' }}" target="_blank" class="text-primary">{{ $file['file_name'] ?? 'View File' }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Proof of Address</th>
                        <td>
                            @if(isset($meta['upload-17']['file']))
                                @php
                                    $file = $meta['upload-17']['file'];
                                @endphp
                                <a href="{{ $file['file_url'] ?? '#' }}" target="_blank" class="text-primary">{{ $file['file_name'] ?? 'View File' }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @if($meta['radio-5'] == 'Yes')
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">2nd Guardian Details</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Title</th>
                        <td>{{ $meta['select-7'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $meta['name-28'] ?? '' }} {{ $meta['name-29'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Relationship to Students(s)</th>
                        <td>{{ $meta['select-3'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            @if(isset($meta['address-5']) && is_array($meta['address-5']))
                                {{ implode(', ', $meta['address-5']) }}
                            @else
                                {{ $meta['address-5'] ?? '' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $meta['email-5'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Confirm Email</th>
                        <td>{{ $meta['email-6'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{ $meta['phone-3'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Home Telephone</th>
                        <td>{{ $meta['phone-5'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Work Number</th>
                        <td>{{ $meta['phone-4'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Proof of ID</th>
                        <td>
                            @if(isset($meta['upload-20']['file']))
                                @php
                                    $file = $meta['upload-20']['file'];
                                @endphp
                                <a href="{{ $file['file_url'] ?? '#' }}" target="_blank" class="text-primary">{{ $file['file_name'] ?? 'View File' }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Proof of Address</th>
                        <td>
                            @if(isset($meta['upload-21']['file']))
                                @php
                                    $file = $meta['upload-21']['file'];
                                @endphp
                                <a href="{{ $file['file_url'] ?? '#' }}" target="_blank" class="text-primary">{{ $file['file_name'] ?? 'View File' }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>

                </tbody>

                
            </table>
        </div>
    </div>
    @endif

    {{-- OTHER DETAILS --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-info text-white">Additional Information</div>
        <div class="card-body">

        <p>An Education & Health Care plan (EHCP) is a formal document detailing a child's learning difficulties and the help they will be given. Does the child have an Education Health Care Plan? <span class="badge bg-primary">{{ $meta['radio-7'] ?? '' }}</span></p>

        <p>Permanent Exclusions : Has this child been permanently excluded (expelled) from their previous school? <span class="badge bg-primary">{{ $meta['radio-8'] ?? '' }}</span></p>

        <p>Fair Access Protocol: (Checkboxes option for the list below)- Does the child fall in any under the below listed categories of the Fair Access Protocol: <span class="badge bg-primary">{{ $meta['radio-9'] ?? '' }}</span></p>

        <p>Special Educational Needs and Disabilities: Is this child on the special educational needs and disabilities code of practice? <span class="badge bg-primary">{{ $meta['radio-10'] ?? '' }}</span></p>

        <p>Medical Conditions: Does the child have any long term medical conditions? <span class="badge bg-primary">{{ $meta['radio-11'] ?? '' }}</span></p>

        <p>Direct Placements: Has the child been directed to an Alternative Provision to improve their behaviour? <span class="badge bg-primary">{{ $meta['radio-12'] ?? '' }}</span></p>

        <p>If any of these apply, provide the supporting local authority <span class="badge bg-primary">{{ $meta['text-1'] ?? '' }}</span></p>

        <p>Provide the name of the assigned social worker <span class="badge bg-primary">{{ $meta['text-2'] ?? '' }}</span></p>

        <p>Attendance in previous school: Attendance percentage <span class="badge bg-primary">{{ $meta['text-3'] ?? '' }}</span></p>

        <p>Consent <span class="badge bg-primary">{{ $meta['consent-1'] ?? '' }}</span></p>

        </div>
    </div>


</div>
@endsection