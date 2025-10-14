@extends('layouts.app')

@section('title','Al-rushd Online School - Referral')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <a href="{{ route('referral') }}" class="logo d-flex align-items-center m-auto" style="background: #f6f9fc;padding-top:10px;padding-bottom:10px;">
    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
</a>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
                <h3 class="page-title">How would you like to get in touch?</h3>

                <ul class="nav nav-pills justify-content-center gap-3" id="customTab" role="tablist">
                    <!-- Book A Call -->
                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('book-a-call') }}">
                            Book A Call
                        </a>
                    </li>

                    <!-- Enquire Now -->
                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('enquire-now') }}">
                            Enquire Now
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('open-event') }}">
                            Attend an Open Event
                        </a>
                    </li>

                    <!-- Referral -->
                    <li class="nav-item">
                        <a class="nav-link active custom-btn" href="{{ route('referral') }}">
                            Referral
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="row mt-4">
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
                                <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 3 minutes</h5>
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

</section>


@endsection

@section('script')

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
            $(".progress-bar").css({
                width: progress + "%",
                transition: "width 0.3s ease"
            });
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
                if (!getFieldValue($field)) {
                    setError($field, "This field is required*");
                    error = true;
                } else {
                    clearError($field);
                }
            });

            const phoneField = currentCard.find("#referralPhone");
            if (phoneField.length && !iti.isValidNumber()) {
                setPhoneError("Please enter a valid phone number");
                error = true;
            } else {
                clearPhoneError();
            }

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
            } else {
                clearPhoneError();
            }

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