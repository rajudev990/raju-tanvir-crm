@extends('student.app')

@section('student')

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <!-- Progress Header -->
                <div class="progress-container mb-4">
                    <h5 class="mb-0 text-light title">Estimated time remaining: 12 minutes</h5>
                    <div class="progress mt-2">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 10%;"></div>
                    </div>
                    <small id="progressText" class="text-light">10%</small>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4 step-one m-auto">
                <h3 class="text-center">Register at <br> Al-Rush International School</h3>
                <p class="text-center text-light" style="font-size: 24px;font-weight:500;">Select your school</p>
            </div>
        </div>

        @include('errors.validation')
        <form action="{{ route('form.step.post', 1) }}" method="POST" id="schoolForm">
            @csrf
            <!-- Hidden input to store selected school -->
            <input type="hidden" name="selected_school" id="selected_school" value="{{ old('selected_school', $data['selected_school'] ?? '') }}">

            <div class="row d-flex justify-content-center">
                @foreach($schools as $item)
                <div class="col-lg-4">
                    <div class="card p-4 mb-3 schoolbox {{ (old('selected_school', $data['selected_school'] ?? '') == $item->name) ? 'active' : '' }}"
                        data-value="{{ $item->name }}"
                        onclick="selectSchool(this)"
                        style="background-color:#0c2a58;border-radius:24px;color:#FFF;cursor:pointer;">
                        <div class="card-body text-center">
                            <img src="{{ Storage::url($item->image) }}" width="48" height="24" alt="" class="img-fluid">
                            <h3 class="py-3" style="font-size: 28px;font-weight: 600;">{{ $item->name }}</h3>
                            <p class="mb-0" style="color: #AE9A66;font-size:20px;font-weight:400;">Time zones:</p>
                            <p style="font-size:20px;font-weight:500;line-height: 28px;">{{ $item->timezone }}</p>
                            <p style="font-weight: 400;font-size: 16px;line-height: 24px;">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Error Message -->
            <div id="schoolError" class="row mt-2 d-none">
                <div class="col-lg-8 m-auto">
                    <div class="alert alert-danger">Please select a school before continuing.</div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="row mt-3">
                <div class="col-lg-4 m-auto">
                    <button type="submit" class="btn custom-btn w-100">Start Registration</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@section('script')
<script>
    function selectSchool(el) {
        // Remove active class from all
        document.querySelectorAll('.schoolbox').forEach(box => box.classList.remove('active'));

        // Add active to clicked
        el.classList.add('active');

        // Set hidden input value
        document.getElementById('selected_school').value = el.getAttribute('data-value');

        // Hide error message if shown
        document.getElementById('schoolError').classList.add('d-none');
    }

    // Form submit validation
    document.getElementById('schoolForm').addEventListener('submit', function(e) {
        let selectedValue = document.getElementById('selected_school').value;
        if (!selectedValue) {
            e.preventDefault();
            // Show error alert
            document.getElementById('schoolError').classList.remove('d-none');
        }
    });

    // Pre-fill selection on page load from session
    document.addEventListener("DOMContentLoaded", function() {
        let preSelected = document.getElementById('selected_school').value;
        if(preSelected) {
            document.querySelectorAll('.schoolbox').forEach(box => {
                if(box.getAttribute('data-value') === preSelected) box.classList.add('active');
            });
        }
    });
</script>
@endsection
