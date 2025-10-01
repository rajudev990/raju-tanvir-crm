@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-9" style="background-color: #f6f5f5;height: 100vh;">

            <div class="row py-3">
                <div class="col-lg-7 col-12">
                    <a href="{{ url('/') }}" class="range-logo">
                        <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="">
                    </a>
                </div>
                <div class="col-12 col-lg-5 d-flex justify-content-around justify-content-lg-start">
                    <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                        <div class="range">
                            <p>Estimated time remaining: 12 minutes</p>
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar-fill" style="width: 8%;"></div>
                                <span class="progress-percent">8%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto">
                    <h2 class="form-heading">Tell us more about the primary parent / guardian</h2>
                </div>
            </div>
           

            <form action="{{ route('patents-info.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-5 m-auto">
                        <div class="form-container">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-lg-4 col-4">
                                    <label class="form-label" for="title">Title</label>
                                    <select class="form-select" name="title" id="title" required>
                                        <option value="Mr" {{ $data->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                        <option value="Mrs" {{ $data->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                        <option value="Miss" {{ $data->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                        <option value="Ms" {{ $data->title == 'Ms' ? 'selected' : '' }}>Ms</option>
                                        <option value="Dr" {{ $data->title == 'Dr' ? 'selected' : '' }}>Dr</option>
                                        <option value="Prof" {{ $data->title == 'Prof' ? 'selected' : '' }}>Prof</option>
                                    </select>
                                </div>

                                <!-- First Name -->
                                <div class="col-lg-8 col-8">
                                    <label class="form-label" for="firstName">First Name</label>
                                    <input type="text" value="{{ $data->first_name }}" name="first_name" class="form-control" id="firstName" placeholder="eg. Tom" required>
                                </div>

                                <!-- Last Name -->
                                <div class="col-12">
                                    <label class="form-label" for="lastName">Last Name</label>
                                    <input type="text" value="{{ $data->last_name }}" name="last_name" class="form-control" id="lastName" required>
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input type="email" value="{{ $data->email }}" name="email" class="form-control" id="email" placeholder="eg. example@email.com" required>
                                </div>

                                <!-- Confirm -->
                                <div class="col-12">
                                    <label class="form-label" for="confirmRole">I confirm I am the</label>
                                    <select class="form-select" name="confirm" id="confirmRole" required>
                                        <option value="Father" {{ $data->confirm == 'Father' ? 'selected' : '' }}>Father</option>
                                        <option value="Mother" {{ $data->confirm == 'Mother' ? 'selected' : '' }}>Mother</option>
                                        <option value="Guardian" {{ $data->confirm == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                    </select>
                                </div>

                                <!-- Checkbox -->
                                <div class="col-12">
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="checkbox" id="updatesCheck" required>
                                        <label class="form-check-label ms-2" for="updatesCheck">
                                            Please keep me updated on news, events and offers from Al-Rushd Independent School
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-continue w-100">Continue</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>





        </div>

        <!-- Info Sidebar -->
        <div class="col-lg-3 p-0" style="height: 100vh;">
            <div class="info-box d-flex flex-column justify-content-center">
                <div>
                    <h4 class="mb-4 text-center">Let’s get started.</h4>

                    <div class="info-step d-flex align-items-start pt-5">
                        <span>1</span>
                        <div class="step-text">
                            <strong class="d-block">Complete this Registration Form</strong>
                            <small>Get started today by completing this Registration Form and paying the
                                Registration Fee.</small>
                        </div>
                    </div>

                    <div class="info-step d-flex align-items-start">
                        <span>2</span>
                        <div class="step-text">
                            <strong class="d-block">Enrol using our Enrolment Dashboard</strong>
                            <small>Sign the contract, pay initial fees, and upload the required
                                documentation.</small>
                        </div>
                    </div>

                    <div class="info-step d-flex align-items-start">
                        <span>3</span>
                        <div class="step-text">
                            <strong class="d-block">Receive your timetable and student hub login</strong>
                            <small>After completion, you will receive your timetable and login details.
                                Welcome!</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection


@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const button = form.querySelector('.btn-continue');
        const requiredFields = form.querySelectorAll('input[required], select[required], input[type="checkbox"][required]');

        function checkFormValidity() {
            let allFilled = true;

            requiredFields.forEach(field => {
                if (field.type === 'checkbox') {
                    if (!field.checked) {
                        allFilled = false;
                    }
                } else {
                    if (!field.value.trim()) {
                        allFilled = false;
                    }
                }
            });

            button.disabled = !allFilled;
        }

        requiredFields.forEach(field => {
            field.addEventListener('input', checkFormValidity);
            field.addEventListener('change', checkFormValidity);
        });

        checkFormValidity();
    });
</script>
@endsection