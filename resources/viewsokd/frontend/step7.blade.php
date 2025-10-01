@extends('layouts.app')

@section('css')


@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 5 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 64%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">64%</span></p>
                    </div>
                </div>
            </div>


            <!-- Title -->
            <div class="row pt-3">
                <div class="col-lg-8 m-auto">
                    <h2 class="form-heading mb-0">Which qualification would you like to take?</h2>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('step7.submit') }}" method="POST">
                @csrf
                <div class="row mb-5 pb-5">
                    <div class="col-lg-8 m-auto">
                        <div class="row justify-content-center g-4 mb-4">
                            <div class="col-12 pt-3">
                                <h4 class="text-center text-light">Choose your Package</h4>
                            </div>

                            <!-- Hidden input: initial value student এর qualification_id থেকে নেওয়া -->
                            <input type="hidden" name="qualification_id" id="qualification_id"
                                value="{{ $student?->qualification_id ?? '' }}" required>

                            <input type="hidden" name="student_serial" value="{{ $serial }}">

                            @php
                            // Student থেকে যেই qualification_id আছে সেটা স্ট্রিং এ কাস্ট করো (null হলে খালি স্ট্রিং)
                            $studentQualificationId = (string) ($student?->qualification_id ?? '');
                            @endphp

                            @foreach($qualifications as $qualification)
                            @php
                            $qualificationId = (string) $qualification->id;
                            $isActive = $studentQualificationId === $qualificationId;
                            @endphp
                            <div class="col-lg-6 col-12">
                                <div class="timetable-option py-5 {{ $isActive ? 'active' : '' }}"
                                    onclick="selectTimetable(this)" data-id="{{ $qualification->id }}">
                                    <div class="checkmark"><i class="fa-solid fa-check"></i></div>
                                    <p class="mt-4 text-light">{{ $qualification->name }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Continue Button -->
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-continue w-100" id="continueBtn"
                                        {{ $student?->qualification_id ? '' : 'disabled' }}>
                                        Continue
                                    </button>
                                    <div class="mt-3">
                                        <a href="{{ route('step6') }}" class="text-light text-decoration-none">&larr; Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

           

        </div>
    </div>
</section>



@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // যদি page load এ আগে থেকেই কোন option active থাকে, তাহলে continue button enable থাকবে
        const hasActive = document.querySelector('.timetable-option.active');
        const continueBtn = document.getElementById('continueBtn');

        if (hasActive) {
            continueBtn.disabled = false;
        } else {
            continueBtn.disabled = true;
        }
    });

    function selectTimetable(element) {
        // Remove active class from all options
        document.querySelectorAll('.timetable-option').forEach(elm => elm.classList.remove('active'));

        // Add active to selected
        element.classList.add('active');

        // Update hidden input value
        const selectedId = element.getAttribute('data-id');
        document.getElementById('qualification_id').value = selectedId;

        // Enable continue button
        document.getElementById('continueBtn').disabled = false;
    }
</script>

@endsection
@endsection