<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/css/countrySelect.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">





    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-size: 16px;
            font-family: "Roboto", sans-serif;
        }

        .custom-btn {
            color: #FFF;
            background-color: #AE9A66;
            border-color: #AE9A66;
            border-radius: 999px;
            padding: 15px 24px;
            font-weight: 600;

        }

        .custom-btn:hover {
            background-color: #183e77;
            color: #FFF;
            border-color: #061e42;
        }

        /* Progress Bar */
        .progress-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .progress {
            height: 4px;
            background-color: #2c3e50;
            max-width: 100%;
            margin: auto;
        }

        .progress-container .title {
            font-weight: 500;
            font-size: 24px;
        }

        @media (max-width:576px) {
            .progress {
                max-width: 100%;
            }
        }

        .progress-bar {
            background-color: #AE9A66;
        }

        /* Progress Bar */
        .step-one h3 {
            font-size: 32px;
            font-weight: 600;
            color: #AE9A66;
        }

        .schoolbox.active {
            border: 1px solid #AE9A66;
        }

        /* Form */
        label {
            margin-bottom: 10px;
        }

        input,
        select {
            padding: 15px 24px !important;
            border-radius: 8px !important;
            background-color: #183e77 !important;
            color: #FFF !important;
            border: 1px solid #183e77 !important;
        }

        .form-select {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 16 16'%3e%3cpath d='M7.247 11.14l-4.796-5.481C2.071 5.253 2.522 4.5 3.2 4.5h9.6c.678 0 1.129.753.749 1.159l-4.796 5.481a1 1 0 0 1-1.506 0z'/%3e%3c/svg%3e") !important;
        }

        .iti--separate-dial-code {
            width: 100%;
        }

        .phone-input {
            padding-left: 85px !important;
        }

        /* Custom Checkbox Design */
        .custom-check {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            padding-left: 35px;
            user-select: none;
            color: #000;
            font-weight: 700;
        }

        .custom-check input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .custom-checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 26px;
            width: 26px;
            background-color: #fff;
            border: 2px solid #ae9a66;
            border-radius: 4px;
            /* চাইলে গোল করে নিতে পারো */
            transition: all 0.3s ease-in-out;
        }

        .custom-check input:checked~.custom-checkmark {
            background-color: #ae9a66;
            border-color: #ae9a66;
        }

        .custom-checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-check input:checked~.custom-checkmark:after {
            display: block;
        }

        .custom-check .custom-checkmark:after {
            left: 8px;
            top: 2px;
            width: 8px;
            height: 12px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }





        /* Tanvir  */
        .custom-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            width: 20px;
            height: 20px;
            border-radius: 50% !important;
            border: 1px solid #AE9A66 !important;
            position: relative;
            vertical-align: middle;
            transition: all 0.2s ease-in-out;
            padding: 0px !important;
        }


        /* Checked হলে */
        .custom-radio:checked {
            background-color: #AE9A66 !important;
            border-color: #AE9A66 !important;
        }


        .custom-chekhbox {
            width: 20px;
            height: 20px;
            background-color: #AE9A66 !important;
            border-color: #AE9A66 !important;
        }

        .error {
            color: #ae9a66;
        }

        .is-invalid {
            border: 2px solid #ae9a66 !important;
            /* লাল */
        }

        .is-valid {
            border: 2px solid #183E77 !important;
            /* সবুজ */
        }



          .custom-checks {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-size: 14px;
            padding-left: 35px;
            user-select: none;
            color:#6c757d;
            font-weight: 700;
        }

        .custom-checks input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .custom-checkmarks {
            position: absolute;
            top: 0;
            left: 0;
            height: 26px;
            width: 26px;
            background-color: #fff;
            border: 2px solid #ae9a66;
            border-radius: 4px;
            /* চাইলে গোল করে নিতে পারো */
            transition: all 0.3s ease-in-out;
        }

        .custom-checks input:checked~.custom-checkmarks {
            background-color: #ae9a66;
            border-color: #ae9a66;
        }

        .custom-checkmarks:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checks input:checked~.custom-checkmarks:after {
            display: block;
        }

        .custom-checks .custom-checkmarks:after {
            left: 8px;
            top: 2px;
            width: 8px;
            height: 12px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .subject-badge.active{
            background-color: #183E77 !important;
        }
        
    </style>
</head>

<body style="min-height: 100vh;background-color:#061e42;">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center m-auto" style="background: #ECF4FF;padding-top:10px;padding-bottom:10px;">
        <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
    </a>
    @yield('student')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/js/countrySelect.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script type="text/javascript">
        // ---- form validation
        $("#form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3
                },
                conf_password: {
                    required: true,
                    equalTo: "#password"
                },
                mobile_number: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter your name!"
                },
                email: {
                    required: "Please enter an email!",
                    email: "Please enter valid email address."
                },
                password: {
                    required: "Please enter password."
                },
                conf_password: {
                    required: "Please enter confirm password.",
                    equalTo: "Password and confirm password does not match"
                },
                mobile_number: {
                    required: "Please enter mobile number."
                },
            },
            // Error label তৈরি হবে
            errorElement: "label",
            errorClass: "error",

            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            },

            errorPlacement: function(error, element) {
                // Checkbox বা radio হলে ভিন্নভাবে বসানো
                if (element.prop("type") === "checkbox" || element.prop("type") === "radio") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element); // input এর নিচে বসবে
                }
            }

        });
    </script>

    @yield('script')
</body>

</html>