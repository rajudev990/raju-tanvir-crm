@extends('layouts.app')

@section('title') Contact @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
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
</style>
@endsection

@section('content')

<section class="section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 mb-3 m-auto text-center">
                <p class="text-light">{{ $event->time }}</p>
                <p class="badge px-5 py-3 rounded rounded-5 text-light" style="background:#AE9A66;font-size:36px;">Open Event</p>
                <p class="text-light pt-1">Join our next online open event and discover what school is like for students at King’s InterHigh. From Key Stage 2 to Key Stage 5, you will have the chance to see how we teach, get to know our teachers and explore if online learning could be right for your child.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card rounded rounded-4" style="background:#0C2A58;">
                    <div class="card-body p-5">
                        <h2 class="text-light text-center mb-5" style="font-size: 36px;font-weight:500;">Meet your speakers</h2>

                        <div class="row">
                            @foreach($data as $item)
                            <div class="col-lg-4 col-12">
                                <div class="text-center p-4" style="border: 1px solid #AE9A66;border-radius:24px;">
                                    <img width="160" height="160" src="{{ Storage::url($item->image) }}" alt="{{ $item->name}}" class="img-fluid rounded rounded-circle">
                                    <h2 class="mb-0 pt-3" style="color: #AE9A66;font-size:24px;font-weight:600;">{{ $item->name}}</h2>
                                    <p class="text-light">{{ $item->designation}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-6 col-12 mb-3 m-auto text-center">
                <h2 class="text-light" style="font-size: 36px;font-weight:bold;">Reserve your spot at our next online open event</h2>
                <p class="badge p-3 rounded rounded-5 text-light mt-3" style="background:#183E77;font-size:16px;">{{ $event->time }}</p>
                <p class="text-light pt-1" style="font-size: 15px;">Attend our next open event to discover an interactive learning environment and get to know our thriving community. To join our open event, please complete the form. We will then send you an individual invitation link and joining instructions to your email.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 m-auto">

                <div class="card rounded rounded-4" style="background:#0C2A58;">
                    <div class="card-body p-5">

                        <form id="openeventForm" action="{{ route('event-store') }}" method="post">
                            @csrf
                            @method('post')
                           
                            <h2 class="mb-4" style="color:#AE9A66;font-size: 24px;font-weight:600;">Parent / Guardian Information</h2>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">First Name<span class="text-danger">*</span></label>
                                    <input name="fname" type="text" class="form-control" placeholder="First Name here" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                    <input name="lname" type="text" class="form-control" placeholder="Last Name here" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" placeholder="Your Email here" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Mobile Number<span class="text-danger">*</span></label>
                                    <input id="phone" type="text" class="form-control" required>
                                     <input type="hidden" name="mobile_number" id="full_phone">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Country of Residence<span class="text-danger">*</span></label>
                                    <select name="country" class="form-select country" required>
                                        <!-- No static options, JavaScript will handle this -->
                                    </select>
                                </div>
                            </div>


                            <h2 class="mb-4 mt-5" style="color:#AE9A66;font-size: 24px;font-weight:600;">Student Details</h2>

                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Student’s First Name<span class="text-danger">*</span></label>
                                    <input name="sfname" type="text" class="form-control" placeholder="First Name here" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Student’s Last Name<span class="text-danger">*</span></label>
                                    <input name="slname" type="text" class="form-control" placeholder="Last Name here" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Student’s Date of Birth<span class="text-danger">*</span></label>
                                    <input name="dob" type="date" class="form-control" required>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Preferred Start Date<span class="text-danger">*</span></label>
                                    <select name="start_date" id="start_date" class="form-control form-select" required>
                                        <option value="">Select Date</option>
                                        <option value="01">01</option>
                                        <option value="0102">0102</option>
                                        <option value="0102033">0102033</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">I am interested in learning more about</label>
                                    <div>
                                        <input value="UK BST Timetable" type="checkbox" name="time[]"> <span class="text-light">UK BST Timetable</span>
                                    </div>
                                    <div>
                                        <input value="Middle East GMT +4 Timetable" type="checkbox" name="time[]"> <span class="text-light">Middle East GMT +4 Timetable</span>
                                    </div>
                                    <div>
                                        <input value="Southeast Asia GMT +7 Timetable" type="checkbox" name="time[]"> <span class="text-light">Southeast Asia GMT +7 Timetable</span>
                                    </div>
                                    <div>
                                        <input value="Studying the IB Diplom" type="checkbox" name="time[]"> <span class="text-light">Studying the IB Diploma</span>
                                    </div>
                                    <div>
                                        <input value="Home Schooling Package" type="checkbox" name="time[]"> <span class="text-light">Home Schooling Package</span>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">If you would like to submit any questions to our admissions team in advance, please write them here.</label>
                                    <textarea name="questions" id="questions" class="form-control" style="height: 150px !important;"></textarea>
                                </div>

                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Please keep me updated on news, events and offers from Al-Rushd</label>
                                    <input type="radio" name="terms" value="yes" required> <span class="text-light">Yes</span>
                                    <input type="radio" name="terms" value="no" required> <span class="text-light">No</span>

                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-continue w-100 text-light">Submit Now</button>
                                <a href="{{ route('open-event') }}" class="text-light d-block mx-auto mt-2" id="prevBtn">← Go back</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>




    </div>

</section>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('frontend/assets/js/jquery.countrySelector.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

<script>
$(document).ready(function() {

    // Initialize each country select individually
    $('.country').each(function() {
        let $select = $(this);

        // Initialize select2
        $select.select2({
            placeholder: 'Select a country',
            allowClear: true,
            width: '100%'
        });

        // Initialize countrySelector with full name
        $select.countrySelector({
            valueType: 'full', // store full country name
            initialCountry: 'United Kingdom'
        });

        // Select initial country after population
        setTimeout(() => {
            let matched = false;
            $select.find('option').each(function() {
                const optionText = $(this).text().trim().toLowerCase();
                if (optionText === 'united kingdom') {
                    $(this).prop('selected', true);
                    matched = true;
                    return false;
                }
            });
            if (matched) $select.trigger('change');
        }, 600);
    });

    // Initialize intl-tel-input for phone
    const phoneInput = document.querySelector("#phone");
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "gb",
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        formatOnDisplay: true
    });

    // jQuery Validate method for phone
    $.validator.addMethod("validPhone", function(value, element) {
        return iti.isValidNumber();
    }, "Please enter a valid phone number");

    // Initialize jQuery Validate
    const validator = $("#openeventForm").validate({
        rules: {
            name: "required",
            email: { required: true, email: true },
            phone: { required: true, validPhone: true },
            country: "required"
        },
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email",
            phone: {
                required: "Please enter your phone number",
                validPhone: "Please enter a valid phone number"
            },
            country: "Please select your country"
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorPlacement: function(error, element) {
            if (element.hasClass("country")) {
                error.insertAfter(element.next(".select2"));
            } else {
                error.insertAfter(element);
            }
            error.addClass("invalid-feedback");
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            // On submit, ensure full country names are stored
            $('.country').each(function() {
                const selectedText = $(this).find('option:selected').text().trim();
                $(this).html(`<option selected value="${selectedText}">${selectedText}</option>`);
            });

            form.submit();
        }
    });

    // Instant phone validation while typing
    $("#phone").on("keyup change blur", function() {
        $("#full_phone").val(iti.isValidNumber() ? iti.getNumber() : '');
        validator.element("#phone");
    });

    // Instant Select2 validation on change
    $(".country").on("change", function() {
        validator.element(this);
    });

});
</script>


@endsection