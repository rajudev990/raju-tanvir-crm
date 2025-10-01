@extends('layouts.app')

@section('css')


@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-5 m-auto">
                <div class="range-wrapper d-lg-flex align-items-center text-center text-lg-start py-4">
                    <div class="range">
                        <p>Estimated time remaining: 6 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 56%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">56%</span></p>
                    </div>
                </div>
            </div>

            <!-- Question -->
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <!-- <h2 class="form-heading">Which year group will This Child be joining?</h2> -->
                    <h2 class="form-heading">Which year group will {{ $student->first_name }} be joining?</h2>
                </div>
            </div>

             <!-- Form -->
            <form action="{{ route('step6.submit') }}" method="POST">
                @csrf
                <div class="row pb-5 mb-5">
                    <div class="col-lg-8 m-auto">

                        @php
                        $selectedGroupId = $student->group_year_id ?? null;
                        $selectedYear = $student->selected_year ?? null;
                        @endphp

                        <!-- Year Options -->
                        @foreach($data as $item)
                        <div class="row justify-content-start g-4 mb-4">
                            <div class="col-12 mt-0">
                                <h6 class="text-center text-light" style="font-size: 24px;">{{ $item->name }}
                                    <small> (
                                        @php
                                        $lists = array_filter([
                                        $item->list1 ?? null,
                                        $item->list2 ?? null,
                                        $item->list3 ?? null,
                                        ]);
                                        $listOutput = implode(' | ', $lists);
                                        @endphp

                                        {!! $listOutput !!}

                                        @if(!empty($item->list4))
                                        || {{ $item->list4 }}
                                        @endif
                                        )</small>
                                </h6>
                            </div>

                            @foreach(['year1', 'year2', 'year3', 'year4', 'year5', 'year6', 'year7', 'year8'] as $yearField)
                            @if(!empty($item->$yearField))
                            @php
                            $isActive = $selectedGroupId == $item->id && $selectedYear == $item->$yearField;
                            @endphp
                            <div class="col-lg-4 col-12">
                                <div class="timetable-option timetable-option-another {{ $isActive ? 'active' : '' }}" onclick="selectTimetable(this)">
                                    <div class="checkmark"><i class="fa-solid fa-check"></i></div>
                                    <p class="mt-2 timetable-title"
                                        data-group-id="{{ $item->id }}"
                                        data-year="{{ $item->$yearField }}">
                                        {{ $item->$yearField }}
                                    </p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <hr>
                        @endforeach

                        <!-- Hidden Inputs -->
                        <input type="hidden" name="student_serial" id="student_serial" value="{{ $serial }}">
                        <input type="hidden" name="group_year_id" id="group_year_id" value="{{ $selectedGroupId }}">
                        <input type="hidden" name="selected_year" id="selected_year" value="{{ $selectedYear }}">


                        <!-- Navigation Buttons -->
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="text-center mt-4">
                                    <button style="padding: 15px;" id="continueBtn" type="submit" class="btn btn-continue w-100" disabled>Continue</button>
                                    <div class="mt-3">
                                        <a href="{{ route('step5') }}" class="text-light text-decoration-none">&larr; Go Back</a>
                                        <!-- <a href="javascript:history.back()" class="text-muted text-decoration-none">&larr; Go Back</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

           

        </div>
    </div>
</section>



@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // যদি আগে থেকে value থাকে তাহলে continue button enable করো
        const groupId = document.getElementById('group_year_id').value;
        const selectedYear = document.getElementById('selected_year').value;

        if (groupId && selectedYear) {
            document.getElementById('continueBtn').disabled = false;
        }
    });

    function selectTimetable(element) {
        // Remove active from all
        document.querySelectorAll('.timetable-option').forEach(el => el.classList.remove('active'));

        // Add active to selected
        element.classList.add('active');

        const p = element.querySelector('.timetable-title');
        const groupId = p.getAttribute('data-group-id');
        const year = p.getAttribute('data-year');

        document.getElementById('group_year_id').value = groupId;
        document.getElementById('selected_year').value = year;

        document.getElementById('continueBtn').disabled = false;
    }
</script>
@endsection
@endsection