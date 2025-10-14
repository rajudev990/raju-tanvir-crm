@extends('layouts.app')

@section('title','Al-rushd Online School - Debit Form')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <a href="{{ route('debit.form') }}" class="logo d-flex align-items-center m-auto" style="background: #f6f9fc;padding-top:10px;padding-bottom:10px;">
    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
</a>
<section class="section">

    <div class="container debitForm py-5">

        <!-- Progress Header -->
        <div class="progress-container">
            <h5 id="formTitle">Direct Debit Form: Step 1</h5>
            <div class="progress mt-3 mb-2">
                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 20%;"></div>
            </div>
            <small id="progressText">20%</small>
        </div>

        <!-- Form Card -->
        <div class="mx-auto" style="max-width:700px;">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <form id="stepForm">

                <!-- Step 1 -->
                <div class="step form-card active">
                    <h4 class="mb-4 form-box-title">Personal Information</h4>
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Forename</label>
                            <input name="forename" type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Surename</label>
                            <input name="surename" type="text" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">Nationality</label>
                            <select name="p_country" class="form-select country" required>
                                <!-- No static options, JavaScript will handle this -->
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step form-card">
                    <h4 class="mb-4 form-box-title">Contact Information</h4>
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">Street Address</label>
                            <input name="street_address" type="text" class="form-control" placeholder="e.g. 45 Walkley Way">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">Apartment, suite, etc</label>
                            <input name="address" type="text" class="form-control" placeholder="Address here">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">City</label>
                            <input name="city" type="text" class="form-control" placeholder="City name">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">State/Province</label>
                            <input name="state" type="text" class="form-control" placeholder="E.G. new South Wales">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Zip/Postal Code</label>
                            <input name="zip_code" type="text" class="form-control" placeholder="Zip/Postal Code">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Nationality</label>
                            <select name="c_country" class="form-select country" required>
                                <!-- No static options, JavaScript will handle this -->
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Your email here">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Confirm Email</label>
                            <input name="confirm_email" type="email" class="form-control" placeholder="Your email here">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">Mobile Number</label>
                            <input name="mobile_number" type="text" class="form-control" placeholder="Your number here">
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step form-card">
                    <h4 class="mb-4 form-box-title">Bank Account Details</h4>
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Bank Name</label>
                            <input name="bank_name" type="text" class="form-control" placeholder="Enter bank name">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Account Number</label>
                            <input name="account_number" type="text" class="form-control" placeholder="Enter account number">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Sort Code</label>
                            <input name="sort_code" type="text" class="form-control" placeholder="Enter sort code">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Preferred Monthly Direct Debit Date</label>
                            <input name="debit_date" type="date" class="form-control" placeholder="DD/MM/YYYY">
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step">
                    <div class="form-card">
                        <h4 class="mb-4 form-box-title">Student Details</h4>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">Child1: Full Name</label>
                                <input name="student_name1" type="text" class="form-control" placeholder="Student name here">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">Your Group</label>
                                <select name="student_group1" class="form-select" required>
                                    <option value="">Select one</option>
                                    @foreach($groups as $item)
                                    <option value="{{ $item->title }}">{{$item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <!-- <span class="text-light mt-4">If you have more than one child enrolled please add them below</span> -->
                        <a href="javascript:void(0)" class="btn btn-success btn-sm" id="addMore">Add More</a>

                    </div>
                    <!-- <div class="form-check">
                        <label class="align-items-center d-flex">
                            <input type="radio" name="more_student" value="yes" class="form-check-input"> <span class="text-light ms-2">Yes</span>
                        </label>
                        <label class="align-items-center d-flex">
                            <input type="radio" name="more_student" value="no" class="form-check-input"> <span class="text-light ms-2">No</span>
                        </label>
                    </div> -->

                    {{-- Hidden Form Card --}}
                    <div class="form-card mt-3" id="otherStudentCard" style="display: none;">
                        <h4 class="mb-4 form-box-title">Other Student Details</h4>
                        <div id="studentRows">
                            {{-- এখানে row dynamically add হবে --}}
                        </div>
                    </div>



                </div>




                <!-- Step 5 -->
                <div class="step form-card">
                    <h4 class="mb-4 form-box-title">Declaration</h4>

                    <div class="consent-box" onclick="toggleConsent(this)">
                        <h5>Consent</h5>
                        <div class="checkmark"><i class="fa-solid fa-check"></i></div>
                        <p>I have read and understood your direct debit process and agree with the Terms and Conditions of Al-Rushd Independent School.</p>
                        <p class="highlight">Please check that all information is correct before submitting it.</p>
                        <p>Direct Debit will be set up by us in accordance with your chosen monthly or quarterly payment option. You will receive an email confirmation from Gocardless once the setup is completed. Please make sure you have sufficient funds in your account by the selected date.</p>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="text-center mt-5">
                    <button type="button" class="btn btn-next w-100 text-light" id="nextBtn">
                        <span id="btnText">Next</span>
                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn-back d-block mx-auto mt-2" id="prevBtn">← Go back</button>
                </div>
            </form>
        </div>
    </div>
</section>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("input[name='more_student']").on("change", function() {
            if ($(this).val() === "yes") {
                $(".another_student").slideDown();
            } else {
                $(".another_student").slideUp();
                // Clear all inputs/selects inside
                $(".another_student").find("input").val('');
                $(".another_student").find("select").prop('selectedIndex', 0);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Add More
        $("#addMore").click(function() {
            // যদি form-card hidden থাকে, তাহলে প্রথমবার show করবে
            if ($("#otherStudentCard").is(":hidden")) {
                $("#otherStudentCard").show();
            }

            // মোট কয়টা row আছে গুনবো
            let childCount = $("#studentRows .student-row").length + 2; // Child 2 থেকে শুরু

            // নতুন row create করব
            let newRow = `
        <div class="row student-row">
            <div class="mb-3 col-lg-6">
                <label class="form-label">Child ${childCount}: Full Name</label>
                <input name="student_name[]" type="text" class="form-control" placeholder="Student name here">
            </div>
            <div class="mb-3 col-lg-5">
                <label class="form-label">Your Group</label>
                <select name="student_group[]" class="form-select">
                    <option value="">Select one</option>
                    @foreach($groups as $item)
                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-lg-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm removeRow mt-4">X</button>
            </div>
        </div>
        `;

            $("#studentRows").append(newRow);
            updateChildLabels(); // Label re-index করব
        });

        // Remove Row
        $(document).on("click", ".removeRow", function() {
            $(this).closest(".student-row").remove();

            // যদি সব row remove হয়ে যায়, তাহলে পুরো card hide হবে
            if ($("#studentRows .student-row").length === 0) {
                $("#otherStudentCard").hide();
            } else {
                updateChildLabels(); // Row remove করলে re-index হবে
            }
        });

        // Function to update child labels
        function updateChildLabels() {
            $("#studentRows .student-row").each(function(index) {
                let childNumber = index + 2; // Child 2 থেকে শুরু
                $(this).find("label.form-label:first").text(`Child ${childNumber}: Full Name`);
            });
        }
    });
</script>
<script>
    function toggleConsent(el) {
        el.classList.toggle("active");
    }
</script>

<script>
    $(document).ready(function() {

        // Loop through each .country select individually
        $('.country').each(function() {
            let $select = $(this);

            // Initialize select2
            $select.select2({
                placeholder: 'Select a country',
                allowClear: true,
                width: '100%'
            });

            // Initialize countrySelector
            $select.countrySelector({
                valueType: 'full', // will store full country name like "United Kingdom"
                initialCountry: 'United Kingdom'
            });

            // Wait for countrySelector to populate, then select initial country
            setTimeout(() => {
                let matched = false;
                $select.find('option').each(function() {
                    const optionText = $(this).text().trim().toLowerCase();
                    if (optionText === 'united kingdom') {
                        $(this).prop('selected', true);
                        matched = true;
                        return false; // break
                    }
                });
                if (matched) {
                    $select.trigger('change');
                }
            }, 600);
        });

        // On form submit: override value with selected country name for all
        $('form').on('submit', function() {
            $('.country').each(function() {
                const selectedText = $(this).find('option:selected').text().trim();
                $(this).html(`<option selected value="${selectedText}">${selectedText}</option>`);
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        const steps = $(".step");
        let currentStep = 0;

        function showStep(step) {
            steps.removeClass("active").eq(step).addClass("active");
            $("#prevBtn").toggle(step !== 0);
            $("#nextBtn #btnText").text(step === steps.length - 1 ? "Submit" : "Next");

            // Update progress bar
            let percent = ((step + 1) / steps.length) * 100;
            $("#progressBar").css("width", percent + "%");
            $("#progressText").text(Math.round(percent) + "%");

            // Update step title
            $("#formTitle").text("Direct Debit Form: Step " + (step + 1));
        }

        // Initialize jQuery Validate
        const validator = $("#stepForm").validate({
            rules: {
                surename: "required",
                email: {
                    required: true,
                    email: true
                },
                confirm_email: {
                    required: true,
                    email: true,
                    equalTo: "input[name='email']"
                },
                account_number: {
                    required: true,
                    number: true,
                    min: 1
                }
            },
            messages: {
                surename: "Please enter your name",
                email: "Please enter a valid email",
                confirm_email: {
                    required: "Please confirm your email",
                    equalTo: "Emails do not match"
                },
                account_number: "Please enter a valid account number"
            },
            errorClass: "is-invalid",
            validClass: "is-valid",
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.insertAfter(element);
            }
        });

        $("#nextBtn").on("click", function() {
            if ($("#stepForm").valid()) {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    submitForm();
                }
            }
        });

        $("#prevBtn").on("click", function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        function submitForm() {
            // Show spinner and disable button
            $("#btnText").text("Submitting...");
            $("#btnSpinner").removeClass("d-none");
            $("#nextBtn").prop("disabled", true);

            let formData = $("#stepForm").serialize();
            $.ajax({
                url: "/debit/store",
                method: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#successMessage").removeClass("d-none").text("Data saved successfully!");

                    // Redirect to success page after 1 second
                    setTimeout(function() {
                        window.location.href = "/debit/success";
                    }, 1000);
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                    // Hide spinner and enable button on error
                    $("#btnText").text("Submit");
                    $("#btnSpinner").addClass("d-none");
                    $("#nextBtn").prop("disabled", false);
                }
            });
        }

        // Initialize first step
        showStep(currentStep);
    });
</script>



@endsection