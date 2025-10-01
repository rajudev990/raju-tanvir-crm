@extends('admin.layouts.app')

@section('title') Admission Student View @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">Admission Student View</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h6 class="card-title" style="color: #fdbb0e;">Parents Information</h6>
                    <br>
                    <p class="mb-0"><b>Name : </b>{{ $data->title }} {{ $data->first_name }} {{ $data->last_name }}</p>
                    <p class="mb-0"><b>Email : </b>{{ $data->email }}</p>
                    <p class="mb-0"><b>Confirm : </b>{{ $data->confirm }}</p>
                    <p class="mb-0"><b>Phone : </b>{{ $data->contact_number_code }} {{ $data->contact_number}}</p>
                    <p class="mb-0"><b>Country : </b>{{ $data->country }}, City : {{ $data->city }}, Post : {{ $data->postal_code }}</p>
                    <p class="mb-0"><b>Address One : </b>{{ $data->address_one }}</p>
                    <p class="mb-0"><b>Address Two : </b>{{ $data->address_two }}</p>
                    <p class="mb-0"><b>Total Child : </b>{{ $data->total_students }}</p>
                    <p class="mb-0"><b>Time Table : </b>{{ $data->time_table }}</p>
                </div>


                <h6 class="card-title" style="color: #fdbb0e;">Student Information</h6>
                <br>
                <br>
                
                <div class="row">
                    @foreach($data->students as $student)
                    <div class="col-lg-6 mb-4 card">
                        <p class="mb-0"><b>Serial : </b>{{ $student->student_serial }}</p>
                        <p class="mb-0"><b>Name : </b>{{ $student->first_name }} {{ $student->last_name }}</p>
                        <p class="mb-0"><b>DOB : </b>{{ $student->dob }}</p>
                        <p class="mb-0"><b>Country : </b>{{ $student->country }}</p>
                        <p class="mb-0"><b>Start Date : </b>{{ $student->start_date }}</p>
                        <p class="mb-0"><b>Year : </b>{{ $student->selected_year }}</p>
                        <p class="mb-0"><b>Group : </b>{{ $student->groupyear?->group?->title }}</p>
                        @php
                            if ($data->courseFee->persubject_price) {
                                $subjectCount = $student->coreSubjects->count();
                                $totalSubjectFee = $subjectCount * $data->courseFee->persubject_price;
                                $finalCourseFee = $totalSubjectFee - $data->courseFee->saving;
                            }
                        @endphp

                        @if ($data->courseFee->persubject_price)
                            <p class="mb-0"><b>Per Subject Fee:</b> £{{ number_format($data->courseFee->persubject_price, 2) }}</p>
                            <p class="mb-0"><b>Total Course Fee:</b> £{{ number_format($finalCourseFee, 2) }}</p>
                        @endif


                        @php
                            $hasCoreSubjects = $data->students->filter(fn($s) => $s->coreSubjects->isNotEmpty())->isNotEmpty();
                            $hasAdditionalSubjects = $data->students->filter(fn($s) => $s->additionalSubjects->isNotEmpty())->isNotEmpty();
                            $hasIslamicSubjects = $data->students->filter(fn($s) => $s->additionalIslamic->isNotEmpty())->isNotEmpty();
                            $hasLanguages = $data->students->filter(fn($s) => $s->additionalLanguages->isNotEmpty())->isNotEmpty();
                            $hasHifdh = $data->students->filter(fn($s) => $s->additionalHifdh->isNotEmpty())->isNotEmpty();
                        @endphp

                        @if($hasCoreSubjects)
                        {{-- Core Subjects --}}
                        <p class="mb-0"><b>Core Subjects: </b>
                            @foreach($student->coreSubjects as $subject)
                            {{ $subject->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        @endif
                        @if($hasAdditionalSubjects)
                        {{-- Additional Subjects --}}
                        <p class="mb-0"><b>Free Additional Subjects: </b>
                            @foreach($student->additionalSubjects as $subject)
                            {{ $subject->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        @endif

                        @if($hasIslamicSubjects)
                        {{-- Additional Islamic --}}
                        <p class="mb-0"><b>Free Islamic & Quranic Subjects: </b>
                            @foreach($student->additionalIslamic as $subject)
                            {{ $subject->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        @endif
                        @if($hasLanguages)
                        {{-- Languages --}}
                        <p class="mb-0"><b>Languages: </b>
                            @foreach($student->additionalLanguages as $language)
                            {{ $language->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        @endif
                        @if($hasHifdh)
                        {{-- Hifdh Programme --}}
                        <p class="mb-0"><b>Hifdh Programme: </b>
                            @foreach($student->additionalHifdh as $hifdh)
                            {{ $hifdh->hifdh_programme }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        @endif


                        <p class="mb-0"><b>Qualification : </b>{{ $student->qualification?->name ?? 'N/A' }}</p>
                        <p class="mb-0"><b>Total Subjects : </b>{{ $student->qualification?->total_subjects ?? 'N/A' }}</p>


                    </div>
                    @endforeach
                </div>
            </div>


            @php
            $courseFee = $data->courseFee;
            $totalStudents = $data->students->count();

            $applicationFee = $courseFee->application_process_fee ?? 0;
            $depositFee = $courseFee->deposit_fee ?? 0;
            $admissionFee = $courseFee->admission_fee ?? 0;
            $saving = $courseFee->saving ?? 0;

            $totalFee = $applicationFee + $depositFee + $admissionFee;
            $discount = ($totalFee * $saving) / 100;
            $netFee = $totalFee - $discount;

            $totalAmount = $netFee * $totalStudents;

            if($courseFee->hifdh_programme_price)
            {
                $hifhd_price = $courseFee->hifdh_programme_price * $totalStudents;
            }

            @endphp

            <div class="row">
                <div class="card shadow-sm p-4 mt-5">
                    <h6 class="card-title mb-5" style="color: #fdbb0e;">💳 Payment Summary</h6>
                    <div class="mb-3">
                        <p class="mb-0"><strong>Course Fee Name:</strong> {{ $courseFee?->name ?? 'N/A' }}</p>
                        <p class="mb-0"><strong>Course Fee Total (Before Discount):</strong> £{{ number_format($totalFee, 2) }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Application Processing Fee:</strong> £{{ number_format($applicationFee, 2) }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Deposit Fee:</strong> £{{ number_format($depositFee, 2) }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Admission Fee:</strong> £{{ number_format($admissionFee, 2) }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Saving / Discount (%):</strong> {{ number_format($saving, 2) }} (%)</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Net Fee (After Discount):</strong> £{{ number_format($netFee, 2) }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="mb-0"><strong>Total Students:</strong> {{ $totalStudents }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <p class="text-dark fw-bold"><strong>Total Payable Amount:</strong> £{{ number_format($totalAmount, 2) }}</p>
                        </div>
                        @if($courseFee->hifdh_programme_price)
                        <div class="col-md-6 mb-0">
                            <p class="text-dark fw-bold"><strong>Hifdh Programme:</strong> £{{ number_format($hifhd_price, 2) }}</p>
                        </div>
                        @endif
                    </div>

                    <hr class="my-4">

                    <h6 class="card-title mt-3 mb-3" style="color: #fdbb0e;">📦 Order Summary</h6>

                    @forelse($data->orders as $order)
                    <div class="border rounded p-2 mb-2">
                        <p class="mb-1"><strong>Order ID:</strong> #{{ $order->id }}</p>
    
                        <p class="mb-1"><strong>Amount:</strong> £{{ number_format($order->amount, 2) }}</p>

                        @if($order->coupon && $order->discount_percentage)
                            <p class="mb-1"><strong>Coupon ({{ $order->coupon }}):</strong> {{ $order->discount_percentage }}%</p>

                            @php
                                $discount = ($order->amount * $order->discount_percentage) / 100;
                                $payable = $order->amount - $discount;
                            @endphp

                            <p class="mb-1"><strong>Discount:</strong> -£{{ number_format($discount, 2) }}</p>
                            <p class="mb-1 text-success"><strong>Payable Amount:</strong> £{{ number_format($payable, 2) }}</p>
                        @endif

                        <p class="mb-1">
                            Payment Method : <span class="text-success fw-bold" style="text-transform: capitalize;">{{ $order->payment_method }}</span>
                        </p>


                        <p class="mb-1"><strong>Status:</strong>
                            @if($order->status === 'paid')
                            <span class="badge bg-success">Paid</span>
                            @elseif($order->status === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                            @else
                            <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                            @endif
                        </p>
                       
                    </div>
                    @empty
                    <p class="text-muted">No orders found for this user.</p>
                    @endforelse
                </div>
            </div>



        </div>
    </div>
</div>
@endsection