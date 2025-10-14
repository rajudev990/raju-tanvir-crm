@extends('layouts.app')

@section('title','Al-rushd Online School - Staff Application')

@section('css')
    <style>
        @media (min-width:768px) {
            .progress{
                max-width: 45%;
            }
        }
    </style>
@endsection

@section('content')
 <a href="{{ route('staff-admission') }}" class="logo d-flex align-items-center m-auto" style="background: #f6f9fc;padding-top:10px;padding-bottom:10px;">
    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
</a>
<section class="section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Title -->
            <div class="row pt-3">
                <div class="col-lg-8 m-auto">

                    <!-- Progress Header (Original Design) -->
                    <div class="progress-container mb-4">
                        <h5 id="formTitle" class="mb-0 text-light">Estimated time remaining: 4 minutes</h5>
                        <div class="progress mt-2">
                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;"></div>
                        </div>
                        <small id="progressText" class="text-light">0%</small>
                    </div>


                    <h2 class="form-heading mb-0">Staff Application Form</h2>
                    <div id="success-message" class="mt-3"></div>
                </div>
            </div>



            <div class="row mt-5">

                <form id="staffApplicationForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-8 m-auto">

                        <div class="card mb-3 step1" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <h5 class="form-section-title fw-bold mb-4" style="font-size: 24px;">Candidate Details</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label"><b>Job Applied For</b></label>
                                        <input type="text" class="form-control" name="job_applied_for" id="job_applied_for" placeholder="Job Applied For">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Forename</label>
                                        <input type="text" class="form-control" name="forename" id="forename" placeholder="Forename">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Middle Names</label>
                                        <input type="text" class="form-control" name="middle_names" id="middle_names" placeholder="Middle Names" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Preferred Name</label>
                                        <input type="text" class="form-control" name="preferred_name" id="preferred_name" placeholder="Preferred Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Gender</label><br>
                                        <input type="radio" name="gender" value="Male"> <span class="text-light">Male</span><br>
                                        <input type="radio" name="gender" value="Female"> <span class="text-light">Female</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Marital Status</label><br>
                                        <input type="radio" name="marital_status" value="Single"> <span class="text-light">Single</span><br>
                                        <input type="radio" name="marital_status" value="Married"> <span class="text-light">Married</span><br>
                                        <input type="radio" name="marital_status" value="Others"> <span class="text-light">Others</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Religion</label>
                                        <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Home Telephone</label>
                                        <input type="text" class="form-control" name="home_telephone" id="home_telephone" placeholder="Home Telephone">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4 row">
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue" id="step2">Next</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 step2" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <h5 class="form-section-title fw-bold mb-4" style="font-size: 24px;">Address</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" class="form-control" name="street_address" id="street_address" placeholder="Street Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Address Line 2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">County / State / Region</label>
                                        <input type="text" class="form-control" name="county_state_region" id="county_state_region" placeholder="County / State / Region">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">ZIP / Postal Code</label>
                                        <input type="text" class="form-control" name="zip_postal_code" id="zip_postal_code" placeholder="ZIP / Postal Code">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Country</label>
                                        <select name="country" class="form-select country" id="country"></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Are you allowed to work in the UK?</label><br>
                                        <input type="radio" name="uk_work" value="Yes"> <span class="text-light">Yes</span><br>
                                        <input type="radio" name="uk_work" value="No"> <span class="text-light">No</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Do you have a cleared DBS?</label><br>
                                        <input type="radio" name="dbs" value="Yes"> <span class="text-light">Yes</span><br>
                                        <input type="radio" name="dbs" value="No"> <span class="text-light">No</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4 row">
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue back mt-0" id="step1">Back</span>
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue" id="step3">Next</span>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="card mb-3 step3" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <h5 class="form-section-title fw-bold mb-4" style="font-size: 24px;">Profile Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Prof of Id</label>
                                        <input type="file" class="form-control" name="prof_of_id" id="prof_of_id">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Prof of Addres</label>
                                        <input type="file" class="form-control" name="prof_of_address" id="prof_of_address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Certificated</label>
                                        <input type="file" class="form-control" name="certificated" id="certificated">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">DBS</label>
                                        <input type="file" class="form-control" name="dbs_one" id="dbs_one">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">CV</label>
                                        <input type="file" class="form-control" name="cv" id="cv">
                                    </div>


                                </div>

                                <div class="d-flex justify-content-end mt-4 row">
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue back mt-0" id="step2">Back</span>
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue" id="step4">Next</span>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="card mb-3 step4" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <h5 class="form-section-title fw-bold mb-4" style="font-size: 24px;">Bank Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Bank Type</label>
                                        <select name="bank_type" class="form-select" id="bank_type">
                                            <option value="international">International</option>
                                            <option value="uk">UK</option>
                                        </select>
                                    </div>
                                    <div id="international">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Name</label>
                                                <input type="text" class="form-control" name="international_account_name" id="international_account_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="international_bank_name" id="international_bank_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Number</label>
                                                <input type="text" class="form-control" name="international_account_number" id="international_account_number">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Swift Code</label>
                                                <input type="text" class="form-control" name="swift_code" id="swift_code">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Branch</label>
                                                <input type="text" class="form-control" name="branch" id="branch">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Branch Code</label>
                                                <input type="text" class="form-control" name="branch_code" id="branch_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="uk">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Name</label>
                                                <input type="text" class="form-control" name="uk_account_name" id="uk_account_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control" name="uk_bank_name" id="uk_bank_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Account Number</label>
                                                <input type="text" class="form-control" name="uk_account_number" id="uk_account_number">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sort Code</label>
                                                <input type="text" class="form-control" name="sort_code" id="sort_code">
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div class="d-flex justify-content-end mt-4 row">
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue back mt-0" id="step3">Back</span>
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue" id="step5">Next</span>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <div class="card mb-3 step5" style="background: #0C2A58;border-radius: 24px;padding:22px;">
                            <div class="card-body p-0">
                                <h5 class="form-section-title fw-bold mb-4" style="font-size: 24px;">Emergency Contact Details</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Forename</label>
                                        <input type="text" class="form-control" name="emergency_forename" id="emergency_forename" placeholder="Forename">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" name="emergency_surname" id="emergency_surname" placeholder="Surname">
                                    </div>

                                </div>

                                <div class="d-flex justify-content-end mt-4 row">
                                    <div class="col-lg-2 col-6">
                                        <span class="btn btn-continue back mt-0" id="step4">Back</span>
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <button type="submit" id="submitBtn" class="btn btn-primary px-4" style="background-color: #A39161; border-color: #A39161; font-size: 18px;">
                                            <span class="btn-text">Send</span>
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>

                </form>
            </div>

        </div>
    </div>
</section>



@endsection

@section('script')

<script>
    $(document).ready(function() {
        // Initialize select2
        $('#country').select2({
            placeholder: 'Select a country',
            allowClear: true,
            width: '100%'
        });

        // Initialize countrySelector
        $('#country').countrySelector({
            valueType: 'full', // store full country name like "United Kingdom"
        });

        // Optional delay in case options are loaded asynchronously
        setTimeout(() => {
            $('#country').trigger('change');
        }, 600);

        // On form submit: override value with selected country name
        $('form').on('submit', function() {
            const selectedText = $('#country option:selected').text().trim();
            const selectedValue = $('#country option:selected').val();

            // Reset the select with the selected value (ensures clean form submission)
            $('#country').html(`<option selected value="${selectedText}">${selectedText}</option>`);
        });
    });
</script>
<script>
    $(document).ready(function() {
        // প্রথমে সব step hide except step1
        $(".step2, .step3, .step4, .step5").hide();

        // Initialize jQuery Validate
        var validator = $("#staffApplicationForm").validate({
            rules: {
                middle_names: {
                    required: true
                },
                surname: {
                    required: true
                },
                street_address: {
                    required: true
                },
                city: {
                    required: true
                },
                profile_photo: {
                    required: false
                },
                emergency_forename: {
                    required: true
                },
                emergency_surname: {
                    required: true
                }
            },
            messages: {
                middle_names: "Please enter your middle names*",
                surname: "Please enter your surname*",
                street_address: "Please enter street address*",
                city: "Please enter city*",
                profile_photo: "Please upload profile photo*",
                emergency_forename: "Please enter emergency forename*",
                emergency_surname: "Please enter emergency surname*"
            },
            errorClass: 'text-warning error_message',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });

        // Next buttons
        $("#step2").click(function() {
            if ($("#staffApplicationForm").valid()) { // validate step1 fields
                $(".step1").hide();
                $(".step2").fadeIn();
            }
        });
        $("#step3").click(function() {
            if ($("#staffApplicationForm").valid()) { // validate step2 fields
                $(".step2").hide();
                $(".step3").fadeIn();
            }
        });
        $("#step4").click(function() {
            if ($("#staffApplicationForm").valid()) { // validate step3 fields
                $(".step3").hide();
                $(".step4").fadeIn();
            }
        });
        $("#step5").click(function() {
            if ($("#staffApplicationForm").valid()) { // validate step4 fields
                $(".step4").hide();
                $(".step5").fadeIn();
            }
        });

        // Back buttons
        $(".back#step1").click(function() {
            $(".step2").hide();
            $(".step1").fadeIn();
        });
        $(".back#step2").click(function() {
            $(".step3").hide();
            $(".step2").fadeIn();
        });
        $(".back#step3").click(function() {
            $(".step4").hide();
            $(".step3").fadeIn();
        });
        $(".back#step4").click(function() {
            $(".step5").hide();
            $(".step4").fadeIn();
        });

        // Form submission
        $("#staffApplicationForm").submit(function(e) {
            e.preventDefault();
            if (!$("#staffApplicationForm").valid()) return;

            var formData = new FormData(this);
            var submitBtn = $("#submitBtn");
            submitBtn.prop("disabled", true);
            submitBtn.find(".btn-text").addClass("d-none");
            submitBtn.find(".spinner-border").removeClass("d-none");

            $.ajax({
                url: '/staff-applications-form',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#success-message").html('<div class="alert alert-success">Application submitted successfully!</div>');
                    $("#staffApplicationForm")[0].reset();
                    $(".step2, .step3, .step4, .step5").hide();
                    $(".step1").show();
                    setTimeout(function() {
                        $("#success-message").html('');
                    }, 4000);
                },
                error: function(xhr) {
                    $("#success-message").html('<div class="alert alert-danger">Something went wrong!</div>');
                    console.log(xhr.responseText);
                },
                complete: function() {
                    submitBtn.prop("disabled", false);
                    submitBtn.find(".btn-text").removeClass("d-none");
                    submitBtn.find(".spinner-border").addClass("d-none");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        function toggleBankType() {
            let type = $("#bank_type").val();
            if (type === "international") {
                $("#international").show();
                $("#uk").hide();
            } else if (type === "uk") {
                $("#international").hide();
                $("#uk").show();
            }
        }

        // page load e check
        toggleBankType();

        // change korle check
        $("#bank_type").on("change", function() {
            toggleBankType();
        });
    });
</script>
<script>
$(document).ready(function() {

    function updateProgress() {
        const countedGroups = {};
        let totalFields = 0;
        let filledFields = 0;

        $("#staffApplicationForm input, #staffApplicationForm select, #staffApplicationForm textarea").each(function() {
            const $field = $(this);
            if ($field.is("[type=hidden]")) return;

            const type = $field.attr("type");
            const name = $field.attr("name");

            if ((type === "checkbox" || type === "radio") && name) {
                // Count radio/checkbox groups once
                if (!countedGroups[name]) {
                    countedGroups[name] = true;
                    totalFields++;
                    if ($(`input[name='${name}']:checked`).length > 0) filledFields++;
                }
            } else if (type === "file") {
                totalFields++;
                if ($field[0].files.length > 0) filledFields++;
            } else {
                totalFields++;
                if ($field.val() && $field.val().trim() !== "") filledFields++;
            }
        });

        const progress = totalFields ? Math.round((filledFields / totalFields) * 100) : 0;
        $(".progress-bar").css("width", progress + "%");
        $(".progress-container small").text(progress + "%");
    }

    // Trigger update on all interactions
    $(document).on("input change", "#staffApplicationForm input, #staffApplicationForm select, #staffApplicationForm textarea", updateProgress);

    // Run once on page load
    updateProgress();

    // ✅ Reset progress bar on successful form submission
    $("#staffApplicationForm").on("submit", function(e) {
        e.preventDefault(); // remove this line if using normal form submission

        // Simulate AJAX or normal submit
        // Example AJAX (optional)
        // $.post($(this).attr('action'), $(this).serialize(), function() { ... });

        // After submission, reset the form & progress
        this.reset();
        $(".progress-bar").css("width", "0%");
        $(".progress-container small").text("0%");
    });

});
</script>


@endsection