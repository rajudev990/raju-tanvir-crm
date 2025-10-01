@extends('layouts.app')

@section('title') Contact @endsection

@section('css')
<style>
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-btn" id="attend-tab" data-bs-toggle="pill" data-bs-target="#attend" type="button" role="tab" aria-controls="attend" aria-selected="false">
                            Attend an Open Event
                        </button>
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
                    <div class="col-lg-6 col-12">
                        <h4>❓ Enquire Now Content</h4>
                        <p>এখানে Enquire Now সম্পর্কিত কন্টেন্ট আসবে।</p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h4>❓ Enquire Now Content</h4>
                        <p>এখানে Enquire Now সম্পর্কিত কন্টেন্ট আসবে।</p>
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
            <div class="tab-pane fade" id="referral" role="tabpanel" aria-labelledby="referral-tab">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h4>👥 Referral Content</h4>
                        <p>এখানে Referral সম্পর্কিত কন্টেন্ট আসবে।</p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h4>👥 Referral Content</h4>
                        <p>এখানে Referral সম্পর্কিত কন্টেন্ট আসবে।</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- Tabs -->


    </div>

</section>


@endsection

@section('script')
<script>
    $(document).ready(function () {

        // ================================
        // Booked slots from backend
        // ================================
        let bookedSlots = @json($bookedSlots);
        // Example: [{date:"2025-08-12", time:"3:00 PM"}, {date:"2025-08-12", time:"3:30 PM"}]

        // ================================
        // Time Slot Generator
        // ================================
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

        // ================================
        // Render Time Options (with Friday logic)
        // ================================
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
        $("#prevMonth").click(function () {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });
        $("#nextMonth").click(function () {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        // ================================
        // Next button validation
        // ================================
        $(".btn-next").click(function (e) {
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
        $(document).on("click", "#back_page", function () {
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

@endsection