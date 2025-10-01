@extends('layouts.app')

@section('content')

<section class="section" style="min-height: 100vh;">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 8 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 40%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">40%</span></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="text-center mb-4">
                        <h4 class="time_table_name_title">How many students <br> would you like to enrol?</h4>
                    </div>
                </div>
            </div>


            <form action="{{ route('step_four.store', session('guardian_id')) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row pt-5">
                    <div class="col-lg-5 m-auto">
                        <div class="card py-5" style="background-color:#0C2A58;border-radius:24px;">
                            <div class="card-body">
                                <div class="student-icons" id="iconContainer">
                                    <!-- Student icons will be rendered dynamically -->
                                </div>

                                @php
                                $totalStudents = old('total_students', $user->total_students ?? 1); // fallback to 1
                                @endphp

                                <div class="controls pt-3">
                                    <button type="button" onclick="decrease()">−</button>
                                    <div class="number-box" id="countDisplay">{{ $totalStudents }}</div>
                                    <input type="hidden" name="total_students" id="totalStudentsInput" value="{{ $totalStudents }}">
                                    <button type="button" onclick="increase()">+</button>
                                    @error('total_students')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn-continue mt-4 w-100">Continue</button>

                        <div class="text-center pt-3">
                            <a href="{{ route('step3') }}" class="text-light text-decoration-none mt-2">&larr; Go Back</a>
                            <!-- <a href="javascript:history.back()" class="text-muted text-decoration-none mt-2">&larr; Go Back</a> -->
                        </div>
                    </div>
                </div>
            </form>




        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    let count = parseInt(document.getElementById('totalStudentsInput').value) || 1;
    const countDisplay = document.getElementById('countDisplay');
    const totalInput = document.getElementById('totalStudentsInput');
    const iconContainer = document.getElementById('iconContainer');

    function renderIcons() {
        iconContainer.innerHTML = '';
        for (let i = 0; i < count; i++) {
            const icon = document.createElement('span');
            icon.innerHTML = '<i class="bi bi-person" style="color:#ae9a66; font-size:50px;"></i>';
            iconContainer.appendChild(icon);
        }
    }

    function increase() {
        if (count < 10) {
            count++;
            updateDisplay();
        }
    }

    function decrease() {
        if (count > 1) {
            count--;
            updateDisplay();
        }
    }

    function updateDisplay() {
        countDisplay.innerText = count;
        totalInput.value = count;
        renderIcons();
    }

    // Initial render
    updateDisplay();
</script>
@endsection