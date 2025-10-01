@extends('layouts.app')

@section('css')
<style>
    .coupon-form {
        max-width: 600px;
        margin: auto;
    }

    .coupon-form .form-control {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        box-shadow: none;
    }

    .coupon-form .btn {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: none;
        transition: 0.3s ease;
        background: #143256;
        border-color: #143256;
    }

    .coupon-form .btn:hover {
        background-color: #0c2a58 !important;
        border-color: #0c2a58 !important;
    }

    .coupon-input:focus {
        width: 80% !important;
    }

    .coupon-input {
        width: 80% !important;
    }

    @media (max-width:575px) {
        .coupon-input:focus {
            width: 75% !important;
        }

        .coupon-input {
            width: 75% !important;
        }

        .parents_title {
            font-size: 19px !important;
        }

        .price-title {
            font-size: 18px !important;
        }
    }

    .parents_title {
        font-size: 24px;
    }

    .price-title {
        font-size: 24px;
    }
</style>
@endsection

@section('content')

<section class="section">
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 2 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 90%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">90%</span></p>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="row">


                    <!--  -->
                    <div class="col-lg-7 col-12">
                        <div class="card" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <div>
                                    <b style="color: #AE9A66;font-size: 24px;font-weight: 600;">Parents Information</b>
                                    <br>
                                    <br>

                                    @if($guardian)
                                    <p class="mb-2 text-light parents_title">Name : {{ $guardian->title }} {{ $guardian->first_name }} {{ $guardian->last_name }}</p>
                                    <p class="mb-2 text-light parents_title">Email : {{ $guardian->email }}</p>
                                    <p class="mb-2 text-light parents_title">Number : {{ $guardian->contact_number_code }} {{ $guardian->contact_number }}</p>
                                    <p class="mb-2 text-light parents_title">Country : {{ $guardian->country }}</p>
                                    <p class="mb-2 text-light parents_title">City : {{ $guardian->city }}</p>
                                    <p class="mb-2 text-light parents_title">Postal Code : {{ $guardian->postal_code }}</p>
                                    <p class="mb-2 text-light parents_title">Address One : {{ $guardian->address_one }}</p>
                                    <p class="mb-2 text-light parents_title">Address Two : {{ $guardian->address_two }}</p>
                                    <a href="{{ route('parents.update',$guardian->id) }}" class="btn btn-continue btn-sm mt-3 px-4" style="width: auto;"><i class="fa fa-edit"></i> Edit</a>
                                    @endif


                                </div>

                            </div>
                        </div>

                        <div class="card mt-4 mb-5" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <b style="color: #AE9A66;font-size: 24px;font-weight: 600;">Student Information</b>
                                <div class="ps-2 row mt-3">
                                    @foreach($students as $item)
                                    <div class="card col-12 col-lg-6" style="background: transparent;border:none !important;">
                                        <div class="card-body p-0" style="position: relative;">

                                            <p class="mb-2 text-light parents_title"><b>Serial :</b> {{ $item->student_serial }}</p>
                                            <p class="mb-2 text-light parents_title"><b>Name :</b> {{ $item->first_name }} {{ $item->last_name }}</p>
                                            <p class="mb-2 text-light parents_title"><b>Date of Birth :</b> {{ $item->dob }}</p>
                                            <p class="mb-2 text-light parents_title"><b>Country :</b> {{ $item->country }}</p>
                                            <p class="mb-2 text-light parents_title"><b>Start Date :</b> {{ $item->start_date }}</p>
                                            @php
                                            $hasCoreSubjects = $students->filter(fn($s) => $s->coreSubjects->isNotEmpty())->isNotEmpty();
                                            $hasAdditionalSubjects = $students->filter(fn($s) => $s->additionalSubjects->isNotEmpty())->isNotEmpty();
                                            $hasIslamicSubjects = $students->filter(fn($s) => $s->additionalIslamic->isNotEmpty())->isNotEmpty();
                                            $hasLanguages = $students->filter(fn($s) => $s->additionalLanguages->isNotEmpty())->isNotEmpty();
                                            $hasHifdh = $students->filter(fn($s) => $s->additionalHifdh->isNotEmpty())->isNotEmpty();
                                            @endphp

                                            @if($hasCoreSubjects)
                                            <p class="fw-bold mb-3" style="color:#AE9A66;font-size:24px;font-weight:500;">Core Subjects</p>
                                            @foreach($item->coreSubjects as $subject)
                                            <span class="badge mb-2" style="background: #183E77;background: #183E77;border-radius: 999px;padding: 10px 15px;font-size: 16px;">{{ $subject->name }}</span>
                                            @endforeach
                                            @endif

                                            @if($hasAdditionalSubjects)
                                            <p class="fw-bold mb-3" style="color:#AE9A66;font-size:24px;font-weight:500;">Additional Subjects</p>
                                            @foreach($item->additionalSubjects as $subject)
                                            <span class="badge mb-2" style="background: #183E77;background: #183E77;border-radius: 999px;padding: 10px 15px;font-size: 16px;">{{ $subject->name }}</span>
                                            @endforeach
                                            @endif

                                            @if($hasIslamicSubjects)
                                            <p class="fw-bold mb-3" style="color:#AE9A66;font-size:24px;font-weight:500;">Islamic Subjects</p>
                                            @foreach($item->additionalIslamic as $subject)
                                            <span class="badge mb-2" style="background: #183E77;background: #183E77;border-radius: 999px;padding: 10px 15px;font-size: 16px;">{{ $subject->name }}</span>
                                            @endforeach
                                            @endif

                                            @if($hasLanguages)
                                            <p class="fw-bold mb-3" style="color:#AE9A66;font-size:24px;font-weight:500;">Languages</p>
                                            @foreach($item->additionalLanguages as $language)
                                            <span class="badge mb-2" style="background: #183E77;background: #183E77;border-radius: 999px;padding: 10px 15px;font-size: 16px;">{{ $language->name }}</span>
                                            @endforeach
                                            @endif
                                            @if($hasHifdh)
                                            <p class="fw-bold mb-3" style="color:#AE9A66;font-size:24px;font-weight:500;">Hifdh Programme</p>
                                            @foreach($item->additionalHifdh as $hifdh)
                                            <span class="badge mb-2" style="background: #183E77;background: #183E77;border-radius: 999px;padding: 10px 15px;font-size: 16px;">{{ $hifdh->hifdh_programme }}</span>
                                            @endforeach
                                            @endif

                                            <!-- <a href="{{ route('studetn-info-update', $item->id) }}" class="btn btn-sm">
                                            <i class="fa fa-edit" style="color: #143256; font-size:18px;position:absolute;top:7px;right:7px;"></i>
                                        </a> -->

                                            <br><br>

                                            <a href="{{ route('studetn-info-update', $item->id) }}" class="btn btn-continue btn-sm mt-3 px-4" style="width: auto;"><i class="fa fa-edit"></i> Edit</a>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--  -->
                    <div class="col-lg-5 col-12">
                        @php
                        $labels = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'];
                        @endphp


                        @php
                        $courseFee = $guardian->courseFee;
                        $totalStudents = $students->count();

                        $applicationFee = $courseFee->application_process_fee ?? 0;
                        $depositFee = $courseFee->deposit_fee ?? 0;
                        $admissionFee = $courseFee->admission_fee ?? 0;
                        $saving = $courseFee->saving ?? 0;

                        $course_fee = $courseFee->course_fee ?? 0;
                        $discount = ($course_fee * $saving) / 100;

                        if ($courseFee->persubject_price) {
                        $total_subject = $students->sum(function($student) {
                        return $student->coreSubjects->count();
                        });

                        $result = $total_subject * $courseFee->persubject_price;
                        $student_course_fee = ($result - $discount) * $totalStudents;

                        } else {
                        $student_course_fee = ($course_fee - $discount) * $totalStudents;
                        }

                        $hasHifdh = $students->filter(fn($s) => $s->additionalHifdh->isNotEmpty())->isNotEmpty();

                        if($hasHifdh)
                        {
                        $hifdh = $courseFee->hifdh_programme_price ?? 0;
                        $hifdh_price = $hifdh * $totalStudents;
                        }


                        $totalFee = $applicationFee + $depositFee + $admissionFee;
                        $totalAmount = $totalFee * $totalStudents;

                        @endphp

                        <div class="card" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <form action="{{ route('pay.now') }}" method="POST" id="paymentForm">
                                    @csrf
                                    <div class="p-4">
                                        <h5 class="mb-4 text-center" style="color: #AE9A66;font-size: 24px;font-weight: 600;">Payment Summary</h5>

                                        <input type="hidden" value="{{ $guardian->id }}" name="user_id">
                                        <input type="hidden" value="{{ $guardian->email }}" name="email">
                                        <input type="hidden" value="{{ $guardian->course_fee_id }}" name="course_id">
                                        <input type="hidden" id="amountHidden" name="amount" value="{{ $totalAmount }}">
                                        <input type="hidden" name="coupon" id="coupon" value="">



                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light price-title">
                                            <span>Application Processing Fee</span>
                                            <span>£{{ number_format($applicationFee, 2) }}</span>
                                        </div>
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Deposit Fee</span>
                                            <span>£{{ number_format($depositFee, 2) }}</span>
                                        </div>
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Admission Fee</span>
                                            <span>£{{ number_format($admissionFee, 2) }}</span>
                                        </div>
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Saving / Discount</span>
                                            <span>{{ number_format($saving, 2) }}%</span>
                                        </div>
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Total Students</span>
                                            <span>{{ $totalStudents }}</span>
                                        </div>
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Course Fee</span>
                                            <span>£{{ number_format(round($student_course_fee), 2) }}</span>
                                        </div>
                                        @php
                                        $hasHifdh = $students->filter(fn($s) => $s->additionalHifdh->isNotEmpty())->isNotEmpty();
                                        @endphp

                                        @if($hasHifdh)
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Hifdh Programme</span>
                                            <span>£{{ number_format(round($hifdh_price), 2) }}</span>
                                        </div>
                                        @endif

                                        {{-- Coupon Discount --}}
                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Coupon Discount</span>
                                            <span id="couponDiscountLabel">0%</span>
                                        </div>

                                        <div class="border-bottom d-flex justify-content-between pb-3 text-light mt-3 price-title">
                                            <span>Total Payable Amount</span>
                                            <span>£<span id="amountDisplay">{{ number_format($totalAmount, 2) }}</span></span>
                                        </div>


                                        <div class="text-end pt-5">
                                            @if($setting->payment_method_status=='1')
                                            <button type="submit" class="btn btn-continue px-4 py-3">Pay Now</button>
                                            <input type="hidden" name="payment_method" value="stripe">
                                            @else
                                            <button type="submit" class="btn btn-continue1 px-4 py-3">Pay Now Offline</button>
                                            <input type="hidden" name="payment_method" value="offline">
                                            @endif

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <form id="couponForm" class="coupon-form">
                                <div class="input-group" style="position: relative;">
                                    <input type="text" class="form-control form-control-lg coupon-input" placeholder="Enter your coupon code" style="border-radius: 999px !important;background-color: #FFF !important;padding: 15px 20px !important;color:#0c2a58 !important;">
                                    <button type="submit" class="btn btn-success btn-lg" style="border-radius: 999px;background: #0C2A58;font-size: 16px;padding: 15px 24px;position: absolute;right: -5px;top: 0;z-index: 9999999;">Apply</button>
                                </div>
                                <small id="couponResult" class="text-danger mt-2 d-block" style="color: #af9b67 !important;font-size:16px;"></small>
                            </form>
                        </div>



                    </div>
                </div>

            </div>




        </div>
    </div>
</section>



@section('script')
<script>
    document.getElementById('couponForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const couponCode = document.querySelector('.coupon-input').value;
        const token = document.querySelector('input[name="_token"]').value;
        const totalAmount = parseFloat({{$totalAmount}});

        fetch("{{ route('apply.coupon') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    coupon: couponCode
                })
            })
            .then(res => res.json())
            .then(data => {
                const resultBox = document.getElementById('couponResult');

                if (data.status) {
                    const discount = data.discount_percentage;
                    const discountAmount = (totalAmount * discount) / 100;
                    const finalAmount = totalAmount - discountAmount;

                    document.getElementById('couponDiscountLabel').innerText = discount + '%';
                    document.getElementById('coupon').value = discount;
                    document.getElementById('amountDisplay').innerText = finalAmount.toFixed(2);
                    document.getElementById('amountHidden').value = finalAmount.toFixed(2);

                    resultBox.classList.remove('text-danger');
                    resultBox.classList.add('text-success');
                    resultBox.innerText = data.message;
                } else {
                    document.getElementById('couponDiscountLabel').innerText = '0%';
                    document.getElementById('coupon').value = '0.00';
                    document.getElementById('amountDisplay').innerText = totalAmount.toFixed(2);
                    document.getElementById('amountHidden').value = totalAmount.toFixed(2);

                    resultBox.classList.remove('text-success');
                    resultBox.classList.add('text-danger');
                    resultBox.innerText = data.message;
                }
            })
            .catch(err => {
                console.error(err);
                document.getElementById('couponResult').innerText = 'Something went wrong!';
            });
    });
</script>
@endsection
@endsection