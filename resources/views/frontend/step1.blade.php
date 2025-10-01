@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 12 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 8%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">8%</span></p>
                    </div>
                </div>
            </div>


            <div class="row">

                <!-- Info Sidebar -->
                <div class="col-lg-5 mb-5 order-lg-1 order-2">
                    <div class="info-box d-flex flex-column justify-content-center">
                        <div>
                            <h4 class="mb-4 text-center lets_start">Let’s get started.</h4>

                            <div class="info-step d-flex align-items-start pt-5">
                                <span>01</span>
                                <div class="step-text">
                                    <strong class="d-block step_text_title">Complete this Registration Form</strong>
                                    <small class="step_text_desc">Get started today by completing this Registration Form and paying the
                                        Registration Fee.</small>
                                </div>
                            </div>

                            <div class="info-step d-flex align-items-start">
                                <span>02</span>
                                <div class="step-text">
                                    <strong class="d-block step_text_title">Enrol using our Enrolment Dashboard</strong>
                                    <small class="step_text_desc">Sign the contract, pay initial fees, and upload the required
                                        documentation.</small>
                                </div>
                            </div>

                            <div class="info-step d-flex align-items-start">
                                <span>03</span>
                                <div class="step-text">
                                    <strong class="d-block step_text_title">Receive your timetable and student hub login</strong>
                                    <small class="step_text_desc">After completion, you will receive your timetable and login details.
                                        Welcome!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Form Section -->
                <div class="col-lg-7 mb-5 order-lg-2 order-1">
                    <form action="{{ route('step_one.store', session('guardian_id')) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="card" style="background: #0C2A58;border-radius: 24px;padding: 36px;">
                            <div class="card-body p-0">

                                <div class="row mb-3">
                                    <div class="col-lg-8 m-auto">
                                        <h2 class="form-heading">Tell us more about the<br>primary parent / guardian</h2>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 m-auto">
                                        <div class="form-container">
                                            <div class="row g-3">

                                                <!-- Title -->
                                                <div class="col-lg-12 col-12">
                                                    <label class="form-label" for="title">Title</label>
                                                    <select class="form-select" name="title" id="title" required>
                                                        <option value="Mr" {{ $user->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                                        <option value="Mrs" {{ $user->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                                        <option value="Miss" {{ $user->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                                        <option value="Ms" {{ $user->title == 'Ms' ? 'selected' : '' }}>Ms</option>
                                                        <option value="Dr" {{ $user->title == 'Dr' ? 'selected' : '' }}>Dr</option>
                                                        <option value="Prof" {{ $user->title == 'Prof' ? 'selected' : '' }}>Prof</option>
                                                    </select>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- First Name -->
                                                <div class="col-lg-6 col-6">
                                                    <label class="form-label" for="firstName">First Name</label>
                                                    <input type="text" value="{{ $user->first_name ? $user->first_name : '' }}" name="first_name" class="form-control" id="firstName" placeholder="Name" required>
                                                    @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Last Name -->
                                                <div class="col-lg-6 col-6">
                                                    <label class="form-label" for="lastName">Last Name</label>
                                                    <input type="text" value="{{ $user->last_name ? $user->last_name : '' }}" name="last_name" class="form-control" id="lastName" required>
                                                    @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Email -->
                                                <div class="col-12">
                                                    <label class="form-label" for="email">Email Address</label>
                                                    <input type="email" value="{{ $user->email ? $user->email : '' }}" name="email" class="form-control"
                                                        id="email" placeholder="eg. example@email.com" required>
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Confirm -->
                                                <div class="col-12">
                                                    <label class="form-label" for="confirmRole">I confirm I am the</label>
                                                    <select class="form-select" name="confirm" id="confirmRole" required>
                                                        <option value="Father" {{ $user->confirm == 'Father' ? 'selected' : '' }}>Father</option>
                                                        <option value="Mother" {{ $user->confirm == 'Mother' ? 'selected' : '' }}>Mother</option>
                                                        <option value="Guardian" {{ $user->confirm == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                                    </select>
                                                    @error('confirm')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row my-5">
                            <!-- Checkbox -->
                            <div class="col-lg-8 col-12">
                                <div class="form-check d-flex">
                                    <input class="form-check-input" type="checkbox" id="updatesCheck" name="subscribe_newsletter" required>
                                    <label class="form-check-label ms-2" for="updatesCheck" style="font-size: 18px;color: #FFF;margin-left: 16px !important;">
                                        Please keep me updated on news, events and offers from Al-Rushd Independent School
                                    </label>
                                    @error('subscribe_newsletter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-continue w-100" style="padding: 15px;">Continue</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
@endsection