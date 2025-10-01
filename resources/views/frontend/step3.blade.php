@extends('layouts.app')

@section('content')

<section class="section" style="min-height: 100vh;">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 9 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 32%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">32%</span></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="text-center mb-4">
                        <h4 class="time_table_name_title"><strong>Thanks {{ $user->first_name }}, <br> let’s start with the basics.</strong></h4>
                        <h5 class="mt-3" style="font-size: 24px;color:#FFF;">Confirm your timetable</h5>
                    </div>
                </div>
            </div>


             <form action="{{ route('user.updateTimetableForm', session('guardian_id')) }}" method="POST" id="timetableForm">

                @csrf
                @method('PUT')

                <div class="row justify-content-center g-4 pb-5">

                    @foreach($times as $item)
                    <div class="col-lg-4 col-12">
                        <div class="timetable-option {{ $user->time_table == $item->name ? 'active' : '' }}"
                            data-timetable="{{ $item->name }}" onclick="selectTimetable(this)">
                            <div class="checkmark"><i class="fa-solid fa-check"></i></div>
                            <h5 class="mt-4">{{ $item->name }}</h5>
                            <p class="text-light">{{ $item->lession }}<br>{{ $item->starting }}</p>
                        </div>
                    </div>
                    @endforeach
                    <input type="hidden" name="time_table" id="timeTableInput" value="{{ old('time_table', $user->time_table) }}">

                </div>


                <!-- <div class="col-lg-3 col-12">
                        <div class="timetable-option {{ $user->time_table == 'Middle East Timetable' ? 'active' : '' }}"
                            data-timetable="Middle East Timetable" onclick="selectTimetable(this)">
                            <div class="checkmark">✔</div>
                            <h5 class="mt-4">Middle East Timetable</h5>
                            <p>Lessons Monday - Friday<br>Starting 08:00am GST/GMT+4</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="timetable-option {{ $user->time_table == 'Southeast Asia Timetable' ? 'active' : '' }}"
                            data-timetable="Southeast Asia Timetable" onclick="selectTimetable(this)">
                            <div class="checkmark">✔</div>
                            <h5 class="mt-4">Southeast Asia Timetable</h5>
                            <p>Lessons Monday - Friday<br>Starting 08:00am GMT+7</p>
                        </div>
                    </div> -->
                <!-- <div class="col-lg-3 col-12">
                        <div class="timetable-option {{ $user->time_table == 'UK Timetable' ? 'active' : '' }}"
                            data-timetable="UK Timetable" onclick="selectTimetable(this)">
                            <div class="checkmark">✔</div>
                            <h5 class="mt-4">UK Timetable</h5>
                            <p>Lessons Monday - Friday<br>Starting 08:00am GMT</p>
                        </div>
                    </div> -->


                <!-- Hidden input to store selected timetable -->


                <!-- <div class="text-center note">
                    Please note the International Baccalaureate (IB) is only available to students who select the UK
                    timetable
                </div> -->

                <div class="text-center time_table">
                    <button class="btn btn-continue px-5 py-2">Continue</button>
                    <div class="mt-3">
                        <a href="{{ route('step2') }}" class="text-light text-decoration-none">&larr; Go Back</a>
                    </div>
                </div>
            </form>


           

        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    function selectTimetable(element) {
        document.querySelectorAll('.timetable-option').forEach(el => el.classList.remove('active'));
        element.classList.add('active');
        document.getElementById('timeTableInput').value = element.getAttribute('data-timetable');
    }
</script>
@endsection