@extends('layouts.app')

@section('title') Contact @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
    /*  */
    .progress-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .progress {
        height: 4px;
        background-color: #2c3e50;
        max-width: 70%;
        margin: auto;
    }

    @media (max-width:576px) {
        .progress {
            max-width: 100%;
        }
    }

    .progress-bar {
        background-color: #AE9A66;
        /* gold */
    }

    /*  */

    .select2-container--default .select2-selection--single {
        -webkit-appearance: none !important;
        appearance: none !important;
        background-color: #183e77 !important;
        border: none !important;
        border-radius: 8px !important;
        color: #fff !important;
        height: 50px !important;
        letter-spacing: -.03125rem !important;
        padding: 12px 24px !important;
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #fff;
    }

    .iti {
        display: block !important;
    }

    .iti input {
        padding-left: 95px !important;
    }

    .iti input:focus {
        padding-left: 95px !important;
    }

    .iti--separate-dial-code .iti__selected-dial-code {
        color: #FFF;
    }


    .page-title {
        font-weight: 500;
        font-style: Medium;
        font-size: 36px;
        line-height: 56px;
        letter-spacing: 0%;
        text-align: center;
    }

    .custom-btn {
        padding: 15px 24px;
        border: 0.5px solid #fff;
        background: transparent;
        color: #fff;
        font-weight: 500;
        font-size: 18px;
    }

    .custom-btn.active {
        background: #AE9A66 !important;
        border-color: #AE9A66 !important;
        color: #fff !important;
    }

    .first-btn {
        border-radius: 99px;
        padding: 15px 24px;
        background: #AE9A66;
        border: none;
        color: #fff;
        font-weight: 500;
        font-size: 18px;
    }

    .card {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 89px;
    }

    .book_a_call_text p {
        font-size: 20px;
        text-align: center;
        font-weight: 400;
        line-height: 28px;
    }

    /*  */
    .calendar-card {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .calendar-card1 {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .enquire-card {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .enquire-card1 {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .enquire-card2 {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .referral-card {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .referral-card1 {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .referral-card2 {
        background: #0C2A58;
        border-radius: 16px;
        padding: 40px 50px;
    }

    .calendar-header {
        font-size: 18px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 15px;
    }

    .month-nav {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 10px 0;
        background: #183E77;
        padding: 8px;
        border-radius: 99px;
        color: #FFF;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        gap: 8px;
        margin-top: 10px;
        color: #FFF !important;
    }

    .day {
        padding: 10px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        color: #FFF;
        font-size: 18px;
    }

    .day.selected-day {
        background-color: #183e77;
    }

    .day:hover {
        background: #284d7a;
    }

    .active-day {
        background: #ae9a66;
        color: #FFF;
        font-weight: bold;
    }

    .form-select,
    .btn {
        border-radius: 30px;
    }

    .btn-next {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .btn-next:hover {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .enquire_btn-next {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .enquire_btn-next:hover {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .referral_btn-next {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .referral_btn-next:hover {
        background: #AE9A66;
        color: #FFF;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .btn-cancel {
        background: transparent;
        border: 1px solid #ccc;
        color: white;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    .btn-cancel:hover {
        background: transparent;
        border: 1px solid #ccc;
        color: white;
        padding: 15px 33px;
        border-radius: 99px;
        font-size: 18px;
        font-weight: 600;
    }

    @media (max-width:576px) {
        .day {
            padding: 4px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            color: #FFF;
            font-size: 16px;
        }

        .calendar-card {
            padding: 41px 25px;
        }

        .calendar-card1 {
            padding: 41px 25px;
        }

        .card {
            padding: 41px 25px;
        }

        .minutes_time {
            font-size: 18px !important;
        }

        .calendar-header h4 {
            font-size: 18px;
        }

        .first-btn,
        .custom-btn {
            padding: 7px 15px;
            font-size: 16px;
        }

        .tab-content {
            margin-top: 0px !important;
        }

        .section h3 {
            font-size: 27px;
            margin-bottom: 0px;
        }
    }

    .minutes_time {
        font-weight: 500;
        font-size: 24px;
        line-height: 30px;
        color: #AE9A66;
        text-align: start;
    }

    /* শুরুতে লুকানো থাকবে */
    .calendar-card1 {
        display: none;
        position: relative;
    }

    /* Slide-in Animation */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .calender_one_title {
        font-size: 24px;
        font-weight: 600;
        color: #AE9A66;
    }

    .calender_one_desc p {
        font-size: 18px;
        font-weight: 400;
    }
</style>
@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
                <h3 class="page-title">How would you like to get in touch?</h3>

                <ul class="nav nav-pills justify-content-center gap-3" id="customTab" role="tablist">
                    <!-- Book A Call -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active custom-btn first-btn" id="book-tab" data-bs-toggle="pill" data-bs-target="#book" type="button" role="tab" aria-controls="book" aria-selected="true">
                            Book A Call
                        </button>
                    </li>

                    <!-- Enquire Now -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-btn" id="enquire-tab" data-bs-toggle="pill" data-bs-target="#enquire" type="button" role="tab" aria-controls="enquire" aria-selected="false">
                            Enquire Now
                        </button>
                    </li>

                    <!-- Attend an Open Event -->
                    <!-- Attend an Open Event -->
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link custom-btn" id="attend-tab" data-bs-toggle="pill" data-bs-target="#attend" type="button" role="tab" aria-controls="attend" aria-selected="false">
                            Attend an Open Event
                        </button>
                    </li> -->

                    <li class="nav-item" role="presentation">
                        <a class="nav-link custom-btn" href="{{ route('open-event') }}">
                            Attend an Open Event
                        </a>
                    </li>

                    <!-- Referral -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-btn" id="referral-tab" data-bs-toggle="pill" data-bs-target="#referral" type="button" role="tab" aria-controls="referral" aria-selected="false">
                            Referral
                        </button>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Tabs -->
        <div class="tab-content mt-5 pt-5" id="customTabContent">
            <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-3">
                        <form action="{{ route('meeting.store') }}" id="meetingForm" method="POST">
                            @csrf
                            <input type="hidden" name="date" value="">

                            <div id="calendarWrapper">
                                <div class="calendar-card">
                                    <div class="calendar-header d-flex justify-content-center">
                                        <div class="me-2">
                                            <i class="fa fa-clock" style="background: #183E77;border-radius: 28px;padding: 11px;font-size: 20px;color: #FFF;"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-light mb-0">Al-Rushd Independent School</h4>
                                            <p class="mb-1 minutes_time">15 Min Admission Meeting</p>
                                        </div>
                                    </div>

                                    <!-- Month Navigation -->
                                    <div class="month-nav">
                                        <span id="prevMonth" class="btn btn-sm text-light"><i class="fa fa-angle-left"></i></span>
                                        <strong id="monthYear"></strong>
                                        <span id="nextMonth" class="btn btn-sm text-light"><i class="fa fa-angle-right"></i></span>
                                    </div>

                                    <!-- Weekdays -->
                                    <div class="calendar-days fw-bold text-secondary">
                                        <div>Mo</div>
                                        <div>Tu</div>
                                        <div>We</div>
                                        <div>Th</div>
                                        <div>Fr</div>
                                        <div>Sa</div>
                                        <div>Su</div>
                                    </div>

                                    <!-- Calendar -->
                                    <div id="calendarDates" class="calendar-days mt-2"></div>

                                    <div class="mt-3 time_zone_times" style="background: #061E42;padding:24px;border-radius: 16px;">
                                        <!-- Time Zone -->
                                        <div class="mb-3">
                                            <label class="form-label">Time Zone</label>
                                            <select class="form-select" name="timezone">
                                                <option value="Asia/Dhaka (2:26 PM)">Asia/Dhaka (2:26 PM)</option>
                                                <option value="Asia/Kolkata">Asia/Kolkata</option>
                                                <option value="UTC">UTC</option>
                                            </select>
                                        </div>

                                        <!-- Time Select -->
                                        <!-- <div class="">
                                            <label class="form-label">Select a Time (Duration: 15 min)</label>
                                            <select class="form-select" name="time">
                                                <option value="3:00 PM">3:00 PM</option>
                                                <option value="3:30 PM">3:30 PM</option>
                                                <option value="4:00 PM">4:00 PM</option>
                                                <option value="4:30 PM">4:30 PM</option>
                                                <option value="5:00 PM">5:00 PM</option>
                                                <option value="5:30 PM">5:30 PM</option>
                                                <option value="6:00 PM">6:00 PM</option>
                                                <option value="6:30 PM">6:30 PM</option>
                                                <option value="7:00 PM">7:00 PM</option>
                                                <option value="7:30 PM">7:30 PM</option>
                                                <option value="8:00 PM">8:00 PM</option>
                                                <option value="8:30 PM">8:30 PM</option>
                                            </select>
                                        </div> -->
                                        <div class="">
                                            <label class="form-label">Select a Time (Duration: 15 min)</label>
                                            <select class="form-select" id="timeSelect" name="time">
                                                <!-- Options will be populated dynamically -->
                                                <option value="">Select Time</option>
                                            </select>
                                        </div>
                                    </div>


                                    <!-- Buttons -->
                                    <div class="d-flex mt-4">
                                        <span class="btn btn-next me-3">Next</span>
                                        <span class="btn btn-cancel">Cancel</span>
                                    </div>
                                </div>
                                <!-- Card 2 (hidden initially) -->
                                <div class="calendar-card1" style="display:none;">
                                    <i id="back_page" style="color: #FFF;font-size: 20px;cursor: pointer;" class="fa fa-angle-left"></i>
                                    <div class="calendar-header">
                                        <h4 class="calender_one_title">Admission Meeting</h4>
                                    </div>

                                    <div class="calender_one_desc selected_data_show mt-5 mb-5" style="background: #061E42;padding:24px;border-radius: 16px;">
                                        <!-- <p class="text-light">Duration: 15 min</p>
                                        <p class="text-light">Date: (6:30pm - 6:45pm) Tuesday, August 12, 2025</p>
                                        <p class="text-light">Time Zone: Asia/Dhaka</p> -->
                                    </div>

                                    <h4 class="text-light">Enter Details</h4>
                                    <div class="calender_one_desc mt-4 mb-5" style="background: #061E42;padding:24px;border-radius: 16px;">
                                        <div class="mb-4">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" placeholder="Enter Your Full Name" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" placeholder="Enter Your Email Address" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Guest Email (Optional)</label>
                                            <input type="text" name="guest_email" placeholder="Enter Guest's Email Address" class="form-control">
                                        </div>
                                    </div>

                                    <h4 class="text-light">Location</h4>

                                    <div class="form-check d-flex mb-3 mt-3">
                                        <input value="Microsoft Teams" class="form-check-input" type="checkbox" id="updatesCheck" name="location">
                                        <label class="form-check-label ms-2" for="updatesCheck" style="font-size: 18px;color: #FFF;margin-left: 16px !important;">
                                            <b>Microsoft Teams</b> <br>Web conferencing details provided upon confirmation.
                                        </label>
                                    </div>

                                    <div class="form-check d-flex">
                                        <input value="Phone Call" class="form-check-input" type="checkbox" id="updatesCheck1" name="location">
                                        <label class="form-check-label ms-2" for="updatesCheck1" style="font-size: 18px;color: #FFF;margin-left: 16px !important;">
                                            Phone Call
                                        </label>
                                    </div>

                                    <p class="text-light mt-5">Please share anything that will help prepare for our meeting.</p>
                                    <textarea name="message" id="" class="form-control" style="background-color: #061e42 !important;border: none;height:100px !important" cols="55" rows="5"></textarea>

                                    <p class="text-light mt-5">By proceeding, you confirm that you have read and agree to Calendly's Terms of Use and Privacy Notice.</p>
                                    <button type="submit" class="btn btn-continue w-50 mt-3" style="padding: 15px;">Schedule Event</button>



                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12 mb-3">

                        <div class="card">
                            <div class="card-body">
                                <div class="text-light book_a_call_text">
                                    <p class="">For immediate assistance, <br>you may Call us on <br><span style="color: #AE9A66;">+442036330757</span></p>
                                    <p>Our hotline is open from Monday to <br><span style="color: #AE9A66;">Friday, 8:30 am – 6:00 pm.</span></p>
                                    <p>Alternatively, we recommend that <br> you still book a call on our site and <br> complete the contact form.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="enquire" role="tabpanel" aria-labelledby="enquire-tab">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3">
                        <form action="{{ route('enquire.store') }}" id="enquireForm" method="POST">
                            @csrf

                            <div id="enquireWrapper">
                                <!-- Card 1 -->
                                <div class="enquire-card">
                                    <h4 class="text-light text-center mb-4">Enquire now</h4>

                                    <!-- Progress Header (Original Design) -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                                    <h1 class="text-light text-center" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;">
                                        Parent / Guardian Information
                                    </h1>

                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input name="fname" type="text" placeholder="First name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input name="lname" type="text" placeholder="Last name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                            <input name="email" type="email" placeholder="Email address here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Mobile Number<span class="text-danger">*</span></label>
                                            <input type="tel" id="phone" class="form-control" required>
                                            <input type="hidden" name="mobile_number" id="full_phone">
                                            <small id="phone-error" class="text-danger d-none"></small>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Country of Residence<span class="text-danger">*</span></label>
                                            <select name="address" class="form-control country" required></select>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <span class="btn enquire_btn-next me-3 w-100 btn-primary">Next</span>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="enquire-card1" style="display:none;">
                                    <h4 class="text-light text-center mb-4">Enquire now</h4>

                                    <!-- Progress Header -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                                    <h1 class="text-light text-center" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;">
                                        Student Details
                                    </h1>

                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s First Name<span class="text-danger">*</span></label>
                                            <input name="student_fname" type="text" placeholder="First name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s Last Name<span class="text-danger">*</span></label>
                                            <input name="student_lname" type="text" placeholder="Last name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s Date of Birth<span class="text-danger">*</span></label>
                                            <input name="student_dob" type="date" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Preferred Start Date<span class="text-danger">*</span></label>
                                            <input name="student_start_date" type="date" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Country of Residence<span class="text-danger">*</span></label>
                                            <select name="student_country" class="form-control country" required></select>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <span class="btn enquire_btn-next me-3 w-100 btn-primary">Next</span>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="enquire_back_page" class="text-light" style="font-size: 20px;cursor: pointer;">Back</a>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="enquire-card2" style="display:none;">
                                    <h4 class="text-light text-center mb-4">Enquire now</h4>

                                    <!-- Progress Header -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                                    <h1 class="text-light text-center" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;">
                                        Enquiry Details
                                    </h1>

                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">What can we help you with?</label>
                                            <select name="details1" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="✔ The registration process">✔ The registration process</option>
                                                <option value="✔ Understanding fees">✔ Understanding fees</option>
                                                <option value="✔ Attending an Open Event">✔ Attending an Open Event</option>
                                                <option value="✔ Lessons, curriculum and teaching">✔ Lessons, curriculum and teaching</option>
                                                <option value="✔ Support for homeschooling">✔ Support for homeschooling</option>
                                                <option value="✔ Exams, exam boards and exam centres">✔ Exams, exam boards and exam centres</option>
                                                <option value="✔ Timetable and term dates">✔ Timetable and term dates</option>
                                                <option value="✔ Our community and extra-curriculars">✔ Our community and extra-curriculars</option>
                                                <option value="✔ Other questions">✔ Other questions</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">I am interested in learning more about?</label>
                                            <div>
                                                <input name="details2" type="checkbox"> <span class="text-light">UK BST Timetable</span>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Please let us know if you have any questions or how our admissions team can help you:</label>
                                            <textarea name="details3" class="form-control" rows="5"></textarea>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Please keep me updated on news, events and offers from Al-Rushd</label>
                                            <div>
                                                <input type="radio" value="1" name="details4"> <span class="text-light">Yes</span>
                                                <input type="radio" value="0" name="details4"> <span class="text-light">No</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <button type="submit" class="btn btn-continue w-100 mt-3" style="padding: 15px;">Submit Now</button>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="enquire_back_page" class="text-light" style="font-size: 20px;cursor: pointer;">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-6 col-12 mb-3">

                        <div class="card">
                            <div class="card-body">
                                <div class="text-light book_a_call_text">
                                    <p class="">For immediate assistance, <br>you may Call us on <br><span style="color: #AE9A66;">+442036330757</span></p>
                                    <p>Our hotline is open from Monday to <br><span style="color: #AE9A66;">Friday, 8:30 am – 6:00 pm.</span></p>
                                    <p>Alternatively, we recommend that <br> you still book a call on our site and <br> complete the contact form.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="referral" role="tabpanel" aria-labelledby="referral-tab">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-3">
                        <form action="{{ route('referral.store') }}" id="referralForm" method="POST">
                            @csrf

                            <div id="referralWrapper">
                                <!-- Card 1 -->
                                <div class="referral-card">
                                     <h4 class="text-center mb-4" style="color: #AE9A66;">Where Faith Meets the Future – Islamic Education at AlRushd.co.uk</h4>
                                    <p class="text-light text-center">You’ve been referred to AlRushd.co.uk — the UK’s leading online Islamic school, combining top-quality British education with strong Islamic values.</p>
                                    <p class="text-light text-center">By enrolling today, you’ll open the door to inspiring learning experiences that nurture your child’s academic success, personal growth, and character development.</p>
                                    <p class="text-light text-center">Secure your child’s future — register now with AlRushd.co.uk for a journey of knowledge, faith, and excellence.</p>


                                     <h1 class="text-light mt-5 mb-3" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;text-align: center;">Parent / Guardian Information</h1>

                                    <!-- Progress Header (Original Design) -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                                   

                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                                            <input name="fname" type="text" placeholder="First name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                            <input name="lname" type="text" placeholder="Last name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                            <input name="email" type="email" placeholder="Email address here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Mobile Number<span class="text-danger">*</span></label>
                                            <input type="tel" id="referralPhone" class="form-control" required>
                                            <input type="hidden" name="mobile_number" id="referralFullPhone">
                                            <small id="referral-phone-error" class="text-danger d-none"></small>
                                        </div>

                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Country of Residence<span class="text-danger">*</span></label>
                                            <select name="address" class="form-control country" required></select>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <span class="btn referral_btn-next me-3 w-100 btn-primary">Next</span>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="referral-card1" style="display:none;">
                                     <h4 class="text-center mb-4" style="color: #AE9A66;">Where Faith Meets the Future – Islamic Education at AlRushd.co.uk</h4>
                                    <p class="text-light text-center">You’ve been referred to AlRushd.co.uk — the UK’s leading online Islamic school, combining top-quality British education with strong Islamic values.</p>
                                    <p class="text-light text-center">By enrolling today, you’ll open the door to inspiring learning experiences that nurture your child’s academic success, personal growth, and character development.</p>
                                    <p class="text-light text-center">Secure your child’s future — register now with AlRushd.co.uk for a journey of knowledge, faith, and excellence.</p>


                                      <h1 class="text-light mt-5 mb-3" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;text-align: center;">Student Details</h1>


                                    <!-- Progress Header -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                                  

                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s First Name<span class="text-danger">*</span></label>
                                            <input name="student_fname" type="text" placeholder="First name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s Last Name<span class="text-danger">*</span></label>
                                            <input name="student_lname" type="text" placeholder="Last name here" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Student’s Date of Birth<span class="text-danger">*</span></label>
                                            <input name="student_dob" type="date" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-6 col-12">
                                            <label class="form-label">Preferred Start Date<span class="text-danger">*</span></label>
                                            <input name="student_start_date" type="date" class="form-control" required>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Country of Residence<span class="text-danger">*</span></label>
                                            <select name="student_country" class="form-control country" required></select>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <span class="btn referral_btn-next me-3 w-100 btn-primary">Next</span>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="referral_back_page" class="text-light" style="font-size: 20px;cursor: pointer;">Back</a>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="referral-card2" style="display:none;">
                                    
                                    <h4 class="text-center mb-4" style="color: #AE9A66;">Where Faith Meets the Future – Islamic Education at AlRushd.co.uk</h4>
                                    <p class="text-light text-center">You’ve been referred to AlRushd.co.uk — the UK’s leading online Islamic school, combining top-quality British education with strong Islamic values.</p>
                                    <p class="text-light text-center">By enrolling today, you’ll open the door to inspiring learning experiences that nurture your child’s academic success, personal growth, and character development.</p>
                                    <p class="text-light text-center">Secure your child’s future — register now with AlRushd.co.uk for a journey of knowledge, faith, and excellence.</p>

                                    <h1 class="text-light mt-5 mb-3" style="color: #AE9A66 !important;font-size: 24px;font-weight: 600;text-align: center;">Enquiry Details</h1>

                                    <!-- Progress Header -->
                                    <div class="progress-container mb-4">
                                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 12 minutes</h5>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <small id="progressText" class="text-light">0%</small>
                                    </div>

                        
                                    <div class="mt-5 row">
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">What can we help you with?</label>
                                            <select name="details1" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="✔ The registration process">✔ The registration process</option>
                                                <option value="✔ Understanding fees">✔ Understanding fees</option>
                                                <option value="✔ Attending an Open Event">✔ Attending an Open Event</option>
                                                <option value="✔ Lessons, curriculum and teaching">✔ Lessons, curriculum and teaching</option>
                                                <option value="✔ Support for homeschooling">✔ Support for homeschooling</option>
                                                <option value="✔ Exams, exam boards and exam centres">✔ Exams, exam boards and exam centres</option>
                                                <option value="✔ Timetable and term dates">✔ Timetable and term dates</option>
                                                <option value="✔ Our community and extra-curriculars">✔ Our community and extra-curriculars</option>
                                                <option value="✔ Other questions">✔ Other questions</option>
                                            </select>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">I am interested in learning more about?</label>
                                            <div>
                                                <input name="details2" type="checkbox"> <span class="text-light">UK BST Timetable</span>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Please let us know if you have any questions or how our admissions team can help you:</label>
                                            <textarea name="details3" class="form-control" rows="5"></textarea>
                                        </div>
                                        <div class="mb-4 col-lg-12 col-12">
                                            <label class="form-label">Please keep me updated on news, events and offers from Al-Rushd</label>
                                            <div>
                                                <input type="radio" value="1" name="details4"> <span class="text-light">Yes</span>
                                                <input type="radio" value="0" name="details4"> <span class="text-light">No</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-4">
                                        <button type="submit" class="btn btn-continue w-100 mt-3" style="padding: 15px;">Submit Now</button>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a id="referral_back_page" class="text-light" style="font-size: 20px;cursor: pointer;">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12 mb-3">

                        <div class="card">
                            <div class="card-body">
                                <div class="text-light book_a_call_text">
                                    <p class="">For immediate assistance, <br>you may Call us on <br><span style="color: #AE9A66;">+442036330757</span></p>
                                    <p>Our hotline is open from Monday to <br><span style="color: #AE9A66;">Friday, 8:30 am – 6:00 pm.</span></p>
                                    <p>Alternatively, we recommend that <br> you still book a call on our site and <br> complete the contact form.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="attend" role="tabpanel" aria-labelledby="attend-tab">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h4>🎓 Attend an Open Event Content</h4>
                        <p>এখানে Attend an Open Event সম্পর্কিত কন্টেন্ট আসবে।</p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h4>🎓 Attend an Open Event Content</h4>
                        <p>এখানে Attend an Open Event সম্পর্কিত কন্টেন্ট আসবে।</p>
                    </div>
                </div>

            </div>
            
        </div>
        <!-- Tabs -->


    </div>

</section>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('frontend/assets/js/jquery.countrySelector.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>


<!-- Book Slot -->
<script>
    $(document).ready(function() {
        let bookedSlots = @json($bookedSlots);

        function generateTimeSlots(start, end, interval) {
            let times = [];
            let startTime = new Date("1970-01-01T" + start);
            let endTime = new Date("1970-01-01T" + end);

            while (startTime <= endTime) {
                let hours = startTime.getHours();
                let minutes = startTime.getMinutes();
                let ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12;
                let minutesStr = minutes < 10 ? '0' + minutes : minutes;
                let timeStr = hours + ':' + minutesStr + ' ' + ampm;
                times.push(timeStr);
                startTime.setMinutes(startTime.getMinutes() + interval);
            }
            return times;
        }

        // Default (not Friday) = 3:00 PM – 8:30 PM
        let defaultStart = "15:00:00";
        let defaultEnd = "20:30:00";

        // Friday = 8:30 AM – 6:00 PM
        let fridayStart = "08:30:00";
        let fridayEnd = "18:00:00";

        function renderTimeOptions(selectedDate) {
            const timeSelect = document.querySelector("select[name='time']");
            timeSelect.innerHTML = "";

            // Day check (0=Sun, 1=Mon, ... 5=Fri, 6=Sat)
            let day = new Date(selectedDate).getDay();

            // Friday হলে অন্য slot
            let allSlots;
            if (day === 5) {
                allSlots = generateTimeSlots(fridayStart, fridayEnd, 30);
            } else {
                allSlots = generateTimeSlots(defaultStart, defaultEnd, 30);
            }

            // Filter booked slots
            let bookedForThisDate = bookedSlots.filter(s => s.date === selectedDate).map(s => s.time);
            let available = allSlots.filter(t => !bookedForThisDate.includes(t));

            if (available.length === 0) {
                let opt = document.createElement("option");
                opt.innerText = "No slots available";
                opt.disabled = true;
                timeSelect.appendChild(opt);
            } else {
                available.forEach(time => {
                    let opt = document.createElement("option");
                    opt.value = time;
                    opt.innerText = time;
                    timeSelect.appendChild(opt);
                });
            }

            updateSummary();
        }

        // ================================
        // Calendar + Day click
        // ================================
        const monthYear = document.getElementById("monthYear");
        const calendarDates = document.getElementById("calendarDates");
        const prevMonthBtn = document.getElementById("prevMonth");
        const nextMonthBtn = document.getElementById("nextMonth");
        let date = new Date();

        function addDayClickListener(dayEl, formattedDate) {
            const selectDate = (e) => {
                e.preventDefault();
                document.querySelectorAll(".day").forEach(d => d.classList.remove("selected-day"));
                dayEl.classList.add("selected-day");
                document.querySelector("input[name='date']").value = formattedDate;
                renderTimeOptions(formattedDate);
            };

            dayEl.addEventListener("click", selectDate);
            dayEl.addEventListener("touchstart", selectDate);
        }

        function renderCalendar() {
            const year = date.getFullYear();
            const month = date.getMonth();
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            monthYear.innerText = `${monthNames[month]} ${year}`;

            const firstDay = new Date(year, month, 1).getDay();
            const startDay = (firstDay === 0) ? 7 : firstDay;
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            calendarDates.innerHTML = "";

            for (let i = 1; i < startDay; i++) {
                const empty = document.createElement("div");
                calendarDates.appendChild(empty);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayEl = document.createElement("div");
                dayEl.classList.add("day");
                dayEl.innerText = day;

                const formattedDate = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
                let slotsForDate = bookedSlots.filter(s => s.date === formattedDate);

                let dayOfWeek = new Date(formattedDate).getDay(); // 0=Sun, 1=Mon, ..., 5=Fri, 6=Sat

                // Friday = 5, rest days = others
                if ((dayOfWeek === 5 && slotsForDate.length >= 20) ||
                    (dayOfWeek !== 5 && slotsForDate.length >= 12)) {
                    dayEl.classList.add("booked-day");
                    dayEl.style.background = "#ae9a66";
                    dayEl.style.color = "#fff";
                    dayEl.style.cursor = "not-allowed";
                } else {
                    addDayClickListener(dayEl, formattedDate);
                }

                calendarDates.appendChild(dayEl);
            }
        }

        // ================================
        // Summary Update
        // ================================
        function updateSummary() {
            const selectedDate = $("input[name='date']").val();
            const selectedTime = $("select[name='time']").val();
            const selectedTimezone = $("select[name='timezone']").val();

            if (!selectedDate || !selectedTime || !selectedTimezone) return;

            // Calculate end time (+15 min)
            let [hour, minPart] = selectedTime.split(":");
            let min = parseInt(minPart);
            let period = minPart.includes("PM") ? "PM" : "AM";
            hour = parseInt(hour);
            if (period === "PM" && hour !== 12) hour += 12;
            if (period === "AM" && hour === 12) hour = 0;

            let end = new Date();
            end.setHours(hour);
            end.setMinutes(min + 15);

            let endHour = end.getHours();
            let endMin = end.getMinutes();
            let endPeriod = endHour >= 12 ? "PM" : "AM";
            endHour = endHour % 12;
            if (endHour === 0) endHour = 12;
            let endMinStr = endMin.toString().padStart(2, "0");
            let endTime = `${endHour}:${endMinStr} ${endPeriod}`;

            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const formattedDate = new Date(selectedDate).toLocaleDateString('en-US', options);

            $(".selected_data_show").html(`
                <p class="text-light">Duration: 15 min</p>
                <p class="text-light">Date: (${selectedTime} - ${endTime}) ${formattedDate}</p>
                <p class="text-light">Time Zone: ${selectedTimezone}</p>
            `);
        }

        // ================================
        // Month Nav
        // ================================
        $("#prevMonth").click(function() {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });
        $("#nextMonth").click(function() {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        // ================================
        // Next button validation
        // ================================
        $(".btn-next").click(function(e) {
            e.preventDefault();

            let selectedDay = $("input[name='date']").val();
            let selectedTimezone = $("select[name='timezone']").val();
            let selectedTime = $("select[name='time']").val();
            let error = false;

            $(".calendar-card .text-danger").remove();

            if (!selectedDay) {
                $("<div class='text-danger mb-2'>Please select a day*</div>").insertBefore(".time_zone_times");
                error = true;
            }
            if (!selectedTimezone) {
                $("<div class='text-danger mb-2'>Please select a timezone*</div>").insertAfter("select[name='timezone']");
                error = true;
            }
            if (!selectedTime) {
                $("<div class='text-danger mb-2'>Please select a time slot*</div>").insertAfter("select[name='time']");
                error = true;
            }

            if (!error) {
                $(".calendar-card").hide();
                $(".calendar-card1").show();
            }
        });

        // Back button
        $(document).on("click", "#back_page", function() {
            $(".calendar-card1").hide();
            $(".calendar-card").show();
        });

        // Update summary on change
        $("select[name='time'], select[name='timezone']").change(updateSummary);

        // ================================
        // Init render
        // ================================
        renderCalendar();

    });
</script>

<script>
    $(document).ready(function() {
        // checkbox একটিমাত্র select করা যাবে
        $("input[name='location']").on('change', function() {
            // সব checkbox uncheck
            $("input[name='location']").not(this).prop('checked', false);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#meetingForm').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true, // email validation
                },
            },
            messages: {
                name: "Please enter your full name*",
                email: "Please enter a valid email address*",
            },
            errorClass: 'text-warning error_message',
        });
    });
</script>

<!-- Enquire -->
<script>
    $(document).ready(function() {
        // Country dropdown
        $(".country").countrySelector();
        $(".country").select2({
            placeholder: "Select country",
            width: '100%'
        });

        // Phone input
        const phoneInput = document.querySelector("#phone");
        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "gb",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // Error handling
        function setError($field, message) {
            clearError($field);
            $field.addClass("is-invalid");
            $field.closest(".mb-4").append(`<div class="text-danger validation-error">${message}</div>`);
        }

        function clearError($field) {
            $field.removeClass("is-invalid");
            $field.closest(".mb-4").find(".validation-error").remove();
        }

        function getFieldValue($field) {
            const type = $field.attr("type");
            const name = $field.attr("name");

            if ($field.attr("id") === "phone") return iti.isValidNumber() ? 1 : 0;
            if ($field.hasClass("country")) return $field.find("option:selected").val() ? 1 : 0;
            if (type === "checkbox" || type === "radio") {
                return $(`input[name='${name}']:checked`).length > 0 ? 1 : 0;
            }
            return $field.val()?.trim() ? 1 : 0;
        }

        function updateProgress() {
            const countedGroups = {};
            let totalFields = 0;
            let filledFields = 0;

            // hidden input (#full_phone) ignore করা হচ্ছে
            $("#enquireForm input, #enquireForm select, #enquireForm textarea").each(function() {
                const $field = $(this);

                // skip hidden inputs explicitly
                if ($field.is("[type=hidden]")) return;

                const type = $field.attr("type");
                const name = $field.attr("name");

                // checkbox/radio group only count once
                if ((type === "checkbox" || type === "radio") && name) {
                    if (!countedGroups[name]) {
                        countedGroups[name] = true;
                        totalFields++;
                        if ($(`input[name='${name}']:checked`).length > 0) filledFields++;
                    }
                }
                // phone field separately
                else if ($field.attr("id") === "phone") {
                    totalFields++;
                    if (iti.isValidNumber()) filledFields++;
                }
                // normal fields
                else {
                    totalFields++;
                    if ($field.val() && $field.val().trim() !== "") filledFields++;
                }
            });

            const progress = totalFields ? Math.round((filledFields / totalFields) * 100) : 0;

            console.log("Total Fields:", totalFields, "Filled Fields:", filledFields, "Progress:", progress + "%");

            $(".progress-bar").css({
                width: progress + "%",
                transition: "width 0.3s ease"
            });
            $(".progress-container small").text(progress + "%");
        }



        // Next button
        $(document).on("click", ".enquire_btn-next", function(e) {
            e.preventDefault();
            const currentCard = $(this).closest(".enquire-card, .enquire-card1, .enquire-card2");
            const nextCard = currentCard.next(".enquire-card, .enquire-card1, .enquire-card2");
            let error = false;

            currentCard.find("input[required], select[required], textarea[required]").each(function() {
                const $field = $(this);
                if (!getFieldValue($field)) {
                    setError($field, "This field is required*");
                    error = true;
                } else {
                    clearError($field);
                }
            });

            if (!error && nextCard.length) {
                currentCard.hide();
                nextCard.show();
            }
            updateProgress();
        });

        // Back button
        $(document).on("click", "#enquire_back_page", function() {
            const currentCard = $(this).closest(".enquire-card1, .enquire-card2");
            const prevCard = currentCard.prev(".enquire-card, .enquire-card1, .enquire-card2");
            currentCard.hide();
            prevCard.show();
            updateProgress();
        });

        // Real-time update
        $(document).on("input change keyup", "input, select, textarea", function() {
            const $field = $(this);
            if (getFieldValue($field)) clearError($field);
            updateProgress();
        });

        $("#phone").on("keyup change", updateProgress);

        // Form submission
         $("#enquireForm").submit(function(e) {

            $(".country").each(function() {
                const $select = $(this);
                const selectedText = $select.find("option:selected").text().trim();
                const selectedValue = $select.val();

                // যদি value এবং text আলাদা হয়, temporary option add
                if (selectedText !== selectedValue) {
                    // remove previous temporary option
                    $select.find(".temp-country-name").remove();

                    // add temporary option
                    $select.append(`<option class="temp-country-name" value="${selectedText}" selected>${selectedText}</option>`);
                }
            });

            if (!iti.isValidNumber()) {
                alert("Please enter a valid phone number");
                return false;
            }
            $("#full_phone").val(iti.getNumber());

        });

        // Initialize
        updateProgress();
    });
</script>
<!-- Enquire -->

<!-- referral -->
<script>
$(document).ready(function() {
    // Country dropdown
    $(".country").countrySelector();
    $(".country").select2({
        placeholder: "Select country",
        width: '100%'
    });

    // Phone input
    const phoneInput = document.querySelector("#referralPhone");
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "gb",
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Error handling
    function setError($field, message) {
        clearError($field);
        $field.addClass("is-invalid");
        $field.closest(".mb-4").append(`<div class="text-danger validation-error">${message}</div>`);
    }
    function clearError($field) {
        $field.removeClass("is-invalid");
        $field.closest(".mb-4").find(".validation-error").remove();
    }

    function setPhoneError(message) {
        $("#referral-phone-error").text(message).removeClass("d-none");
        $("#referralPhone").addClass("is-invalid");
    }
    function clearPhoneError() {
        $("#referral-phone-error").text("").addClass("d-none");
        $("#referralPhone").removeClass("is-invalid");
    }

    function getFieldValue($field) {
        const type = $field.attr("type");
        if ($field.attr("id") === "referralPhone") return iti.isValidNumber() ? 1 : 0;
        if ($field.hasClass("country")) return $field.find("option:selected").val() ? 1 : 0;
        if (type === "checkbox" || type === "radio") return $(`input[name='${$field.attr("name")}']:checked`).length > 0 ? 1 : 0;
        return $field.val()?.trim() ? 1 : 0;
    }

    function updateProgress() {
        const countedGroups = {};
        let totalFields = 0;
        let filledFields = 0;

        $("#referralForm input, #referralForm select, #referralForm textarea").each(function() {
            const $field = $(this);
            if ($field.is("[type=hidden]")) return;

            const type = $field.attr("type");
            const name = $field.attr("name");

            if ((type === "checkbox" || type === "radio") && name) {
                if (!countedGroups[name]) {
                    countedGroups[name] = true;
                    totalFields++;
                    if ($(`input[name='${name}']:checked`).length > 0) filledFields++;
                }
            } else if ($field.attr("id") === "referralPhone") {
                totalFields++;
                if (iti.isValidNumber()) filledFields++;
            } else {
                totalFields++;
                if ($field.val() && $field.val().trim() !== "") filledFields++;
            }
        });

        const progress = totalFields ? Math.round((filledFields / totalFields) * 100) : 0;
        $(".progress-bar").css({ width: progress + "%", transition: "width 0.3s ease" });
        $(".progress-container small").text(progress + "%");
    }

    // Next & Back buttons
    $(document).on("click", ".referral_btn-next", function(e) {
        e.preventDefault();
        const currentCard = $(this).closest(".referral-card, .referral-card1, .referral-card2");
        const nextCard = currentCard.next(".referral-card, .referral-card1, .referral-card2");
        let error = false;

        currentCard.find("input[required], select[required], textarea[required]").each(function() {
            const $field = $(this);
            if (!getFieldValue($field)) { setError($field, "This field is required*"); error = true; }
            else { clearError($field); }
        });

        const phoneField = currentCard.find("#referralPhone");
        if (phoneField.length && !iti.isValidNumber()) {
            setPhoneError("Please enter a valid phone number");
            error = true;
        } else { clearPhoneError(); }

        if (!error && nextCard.length) {
            currentCard.hide();
            nextCard.show();
        }
        updateProgress();
    });

    $(document).on("click", "#referral_back_page", function() {
        const currentCard = $(this).closest(".referral-card1, .referral-card2");
        const prevCard = currentCard.prev(".referral-card, .referral-card1, .referral-card2");
        currentCard.hide();
        prevCard.show();
        updateProgress();
    });

    // Real-time input update
    $(document).on("input change keyup", "#referralForm input, #referralForm select, #referralForm textarea", function() {
        const $field = $(this);
        if (getFieldValue($field)) clearError($field);
        if ($field.attr("id") === "referralPhone" && iti.isValidNumber()) clearPhoneError();
        updateProgress();
    });

    // Form submission
    $("#referralForm").submit(function(e) {
        // set full international number before validation
        phoneInput.value = iti.getNumber();

        if (!iti.isValidNumber()) {
            e.preventDefault();
            setPhoneError("Please enter a valid phone number");
            $("#referralPhone").focus();
            return false;
        } else { clearPhoneError(); }

        // hidden input
        $("#referralFullPhone").val(phoneInput.value);

        // store country name instead of code
        $(".country").each(function() {
            const $select = $(this);
            const selectedText = $select.find("option:selected").text().trim();
            $select.find(".temp-country-name").remove();
            $select.append(`<option class="temp-country-name" value="${selectedText}" selected>${selectedText}</option>`);
        });
    });

    // Initialize progress
    updateProgress();
});
</script>

<!-- referral -->
@endsection