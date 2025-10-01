@extends('layouts.app')

@section('css')

{{-- In @section('css') --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
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
</style>

@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 7 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 48%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">48%</span></p>
                    </div>
                </div>
            </div>

            <div>
                 <!-- Form Section -->
                <div class="col-lg-7 mb-5 order-lg-2 order-1 m-auto">
                    <form action="{{ route('student.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="student_id" value="{{ $student->id ?? '' }}">
                        <input type="hidden" name="student_serial" value="{{ $student->student_serial ?? '' }}">



                        <div class="card" style="background: #0C2A58;border-radius: 24px;padding: 36px;">
                            <div class="card-body p-0">

                                <div class="row mb-3">
                                    <div class="col-lg-12 m-auto">
                                        <h2 class="form-heading">Tell us about your {{ $serialPosition }} student</h2>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Student's First Name</label>
                                        <input type="text" name="first_name" class="form-control" required value="{{ isset($student->id) ? $student->first_name : '' }}">
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Student's Last Name</label>
                                        <input type="text" name="last_name" class="form-control" required value="{{ isset($student->id) ? $student->last_name : '' }}">
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Student's Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" required value="{{ isset($student->id) ? $student->dob : '' }}">
                                        @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Country of Residence</label>
                                        <select name="country" class="form-select country" id="country" required>
                                            <!-- No static options, JavaScript will handle this -->
                                        </select>
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label class="form-label">Desired Start Date</label>
                                        <select name="start_date" class="form-select" required>
                                            <option value="">Please Select</option>
                                            <option value="September-2025" {{ isset($student->id) && $student->start_date == 'September-2025' ? 'selected' : '' }}>September-2025</option>
                                        </select>
                                        @error('start_date')
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
                                <a href="{{ route('step4') }}" class="text-light">&larr; Go Back</a>
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


<script>
    $(document).ready(function() {
        const selectedCountry = @json($student->country ?? '').trim();

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
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const button = form.querySelector('.btn-continue');

        const fields = [
            form.querySelector('input[name="first_name"]'),
            form.querySelector('input[name="last_name"]'),
            form.querySelector('input[name="dob"]'),
            form.querySelector('select[name="start_date"]'),
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

        fields.forEach(field => {
            if (field) {
                field.addEventListener('input', checkFormValidity);
                field.addEventListener('change', checkFormValidity);
            }
        });

        checkFormValidity();
    });
</script>



@endsection
@endsection