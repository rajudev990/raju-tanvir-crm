@extends('layouts.app')

@section('css')
{{-- CSS --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/jquery-countryselector.min.css') }}" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
        -webkit-appearance: none !important;
        appearance: none !important;
        background-color: #fff !important;
        border: 2px solid #dedbdd !important;
        border-radius: 3px !important;
        color: #444 !important;
        height: 50px !important;
        letter-spacing: -.03125rem !important;
        padding: 10px !important;
        width: 100% !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-12" style="background-color: #f6f5f5;min-height: 100vh;">

            <div class="row py-3">
                <div class="col-lg-5 col-12">
                    <a href="{{ url('/') }}" class="range-logo">
                        <img src="{{ asset('frontend')}}/assets/img/logo.png" alt="">
                    </a>
                </div>
                <div class="col-12 col-lg-7 d-flex justify-content-around justify-content-lg-start">
                    <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                        <div class="range">
                            <p>Estimated time remaining: 7 minutes</p>
                            <div class="progress-bar-wrapper">
                                <div class="progress-bar-fill" style="width: 48%;"></div>
                                <span class="progress-percent">48%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto">
                    <h2 class="form-heading">Tell us about your {{ numberToOrdinal($data->student_serial) }} student</h2>
                </div>
            </div>
            <div class="row pb-5 mb-5">
                <div class="col-lg-4 m-auto">
                    <div class="form-container">
                       

                        <form action="{{ route('student-information.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Student's First Name</label>
                                    <input type="text" name="first_name" class="form-control" required value="{{ $data->first_name }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Student's Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required value="{{ $data->last_name }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Student's Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" required value="{{ $data->dob }}">
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Country of Residence</label>
                                    <select name="country" class="form-select country" id="country" required>
                                        <!-- No static options, JavaScript will handle this -->
                                    </select>
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                              
                                <div class="col-12">
                                    <label class="form-label">Desired Start Date</label>
                                    <select name="start_date" class="form-select" required>
                                        <option value="">Please Select</option>
                                        <option value="September-2025" {{ $data->start_date == "September-2025" ? 'selected' : '' }}>September-2025</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-5">
                                    <button type="submit" class="btn btn-continue w-100">Continue</button>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="{{ route('step9') }}" class="text-muted">&larr; Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{{-- JS --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('frontend/assets/js/jquery.countrySelector.js') }}"></script>


<script>
    $(document).ready(function() {
        const selectedCountry = @json($data->country ?? '').trim();

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
@endsection