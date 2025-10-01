@extends('admin.layouts.app')

@section('title') Open Event (Entry #{{ $data->entry_id }}) @endsection


@section('content')


<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Open Event (Entry #{{ $data->entry_id }})</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium"><a href="{{ route('admin.open-event-form.index') }}" class="btn btn-dark btn-sm">Back</a></li>
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
                        <th>Country of Residence</th>
                        <td>
                            {{ $data->country }}
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
                        <th style="width: 50%;">Student First Name</th>
                        <td>{{ $data->sfname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 50%;">Student Last Name</th>
                        <td>{{ $data->slname ?? '' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 50%;">Date of Birth</th>
                        <td>
                            {{ $data->dob ?? '' }}
                        </td>

                    </tr>
                    <tr>
                        <th style="width: 50%;">Preferred Start Date</th>
                        <td>{{ $data->start_date ?? '' }}</td>
                    </tr>

                    <tr>
                        <th style="width: 50%;">Times </th>
                        <td>
                            @if(is_array($data->time))
                            {{ implode(', ', $data->time) }}
                            @else
                            {{ $data->time }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 50%;">Questions </th>
                        <td>{{ $data->questions ?? '' }}</td>
                    </tr>

                    <tr>
                        <th style="width: 50%;">Terms</th>
                        <td>{{ $data->terms ?? '' }}</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>




</div>
@endsection