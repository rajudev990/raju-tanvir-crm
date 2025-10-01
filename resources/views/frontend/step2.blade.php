@extends('layouts.app')

@section('css')

{{-- In @section('css') --}}
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
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        color: #fff;
    }

    .iti {
        display: block !important;
    }

    .iti input{
        padding-left: 95px !important;
    }
    .iti input:focus{
        padding-left: 95px !important;
    }
    .iti--separate-dial-code .iti__selected-dial-code
    {
        color: #FFF;
    }
</style>

@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 10 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 16%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">16%</span></p>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Form Section -->
                <div class="col-lg-7 mb-5 order-lg-2 order-1 m-auto">
                    <form action="{{ route('step_two.store', session('guardian_id')) }}" method="POST">

                        @csrf
                        @method('PUT')


                        <div class="card" style="background: #0C2A58;border-radius: 24px;padding: 36px;">
                            <div class="card-body p-0">

                                <div class="row mb-3">
                                    <div class="col-lg-8 m-auto">
                                        <h2 class="form-heading">Tell us more about the primary parent / guardian</h2>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label">Country of Residence</label>
                                        <select name="country" class="form-select country" id="country" required>
                                            <!-- No static options, JavaScript will handle this -->
                                        </select>
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>






                                    <div class="col-12 mb-4">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" id="phone" class="form-control" required>
                                        <input type="hidden" name="contact_number" id="full_phone" value="{{ old('contact_number', $user->contact_number ?? '') }}">
                                        @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <small id="phone-error" class="text-danger d-none"></small>
                                    </div>




                                    {{-- Address One --}}
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Address Line 1</label>
                                        <input type="text" name="address_one" class="form-control" required value="{{ $user->address_one ? $user->address_one : '' }}">
                                        @error('address_one')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Address Two --}}
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Address Line 2 (optional)</label>
                                        <input type="text" name="address_two" class="form-control" value="{{ $user->address_two ? $user->address_two : '' }}">
                                        @error('address_two')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- City --}}
                                    <div class="col-12 mb-4">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" required value="{{ $user->city ? $user->city : '' }}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Postal Code --}}
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" required value="{{ $user->postal_code ? $user->postal_code : '' }}">
                                        @error('postal_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div>

                            </div>
                        </div>


                        <div class="row my-3">


                            <!-- Submit -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-continue w-100" style="padding: 15px;">Continue</button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('step1') }}" class="text-light">&larr; Go Back</a>
                                <!-- <a href="javascript:history.back()" class="text-muted">&larr; Go Back</a> -->
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>



@section('script')

{{-- In @section('script') --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('frontend/assets/js/jquery.countrySelector.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>




<script>
    $(document).ready(function() {
        const selectedCountry = @json($user->country ?? '').trim();

        // Initialize select2
        $('#country').select2({
            placeholder: 'Select a country',
            allowClear: true,
            width: '100%'
        });

        // Initialize countrySelector
        $('#country').countrySelector({
            valueType: 'full', // will store full country name like "United Kingdom"
            initialCountry: selectedCountry || 'United Kingdom'
        });

        // Wait for countrySelector to populate
        setTimeout(() => {
            let matched = false;

            $('#country option').each(function() {
                const optionText = $(this).text().trim().toLowerCase();
                const optionValue = $(this).val().trim().toLowerCase();
                const selected = selectedCountry.toLowerCase();

                if (optionValue === selected || optionText === selected) {
                    $(this).prop('selected', true);
                    matched = true;
                    return false; // break
                }
            });

            if (matched) {
                $('#country').trigger('change');
            }
        }, 600);

        // On form submit: override value with selected country name
        $('form').on('submit', function() {
            const selectedText = $('#country option:selected').text().trim();
            $('#country').html(`<option selected value="${selectedText}">${selectedText}</option>`);
        });
    });
</script>


<script>
    $(document).ready(function() {
        const input = document.querySelector("#phone");

        const iti = window.intlTelInput(input, {
            initialCountry: "gb",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // Prefill if a value exists (set full phone number into the plugin)
        const oldNumber = $('#full_phone').val();
        if (oldNumber) {
            iti.setNumber(oldNumber);
        }

        function validatePhone() {
            const fullNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);

            if (!iti.isValidNumber()) {
                $('#phone').addClass('is-invalid');
                $('#phone-error').text('Please enter a valid phone number').removeClass('d-none');
            } else {
                $('#phone').removeClass('is-invalid');
                $('#phone-error').addClass('d-none');
                $('#full_phone').val(fullNumber);
            }
        }

        input.addEventListener('change', validatePhone);
        input.addEventListener('keyup', validatePhone);
        checkFormValidity();

        $('form').on('submit', function() {
            const fullNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);
            $('#full_phone').val(fullNumber);
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const button = form.querySelector('.btn-continue');

        // যেসব ফিল্ড ফর্মে আছে সেগুলো সিলেক্ট করছি
        const fields = [
            form.querySelector('input[name="address_one"]'),
            form.querySelector('input[name="city"]'),
            form.querySelector('input[name="postal_code"]'),
        ];

        function checkFormValidity() {
            let allFilled = true;

            for (const field of fields) {
                if (!field || !field.value.trim()) {
                    allFilled = false;
                    break;
                }
            }

            button.disabled = !allFilled;
        }

        // সব ফিল্ডে ইভেন্ট লাগানো
        fields.forEach(field => {
            if (field) {
                field.addEventListener('input', checkFormValidity);
                field.addEventListener('change', checkFormValidity);
            }
        });

        // পেজ লোডেই চেক করা
        checkFormValidity();
    });
</script>
@endsection
@endsection