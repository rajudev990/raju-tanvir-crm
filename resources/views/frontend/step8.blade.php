@extends('layouts.app')

@section('css')
<style>
    .timetable-option {
        position: relative;
        /* border: 1px solid #ccc; */
        padding: 15px;
        border-radius: 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;

    }

    .timetable-option.active {
        background-color: #AE9A66;
        color: #FFF;
    }

    .timetable-option.active h5{
        color: #FFF;
    }
      

    .timetable-option .checkmark {
        font-size: 18px;
        color: #0f5132;
    }

    .timetable-option.locked {
        background-color: #0C2A58;
        pointer-events: none;
        opacity: 0.8;
        border: none;
        border-radius: 24px;
    }

    #selectedSubjectsList {
        font-size: 20px;
        color: #fff;
        margin-top: 15px;
        line-height: 2;
    }
    .timetable-option.active .checkmark{
        background-color: transparent;
        border-color: #FFF;
        color: #FFF;
        border-radius: 4px;
    }
    .timetable-option h5{
        font-size: 24px;
    }
    .activecore h5{
        color: #ae9a66 !important;
    }
    .activecore .checkmark{
        border-color: #ae9a66 !important;
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
                        <p>Estimated time remaining: 5 minutes</p>
                        <div class="progress-bar-wrapper">
                            <div class="progress-bar-fill" style="width: 72%;"></div>

                        </div>
                        <p class="pt-3 text-center"><span class="">72%</span></p>
                    </div>
                </div>
            </div>

            
            <form id="subjectSubmitForm" action="{{ route('subjects.updateSelection') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="core_subjects" id="coreSubjectsInput">
                <input type="hidden" name="additional_subjects" id="additionalSubjectsInput">
                <input type="hidden" name="languages" id="languagesInput">
                <input type="hidden" name="islamic_subjects" id="islamicSubjectsInput">
                <input type="hidden" name="hifdh_programmes" id="hifdhProgrammesInput">


                <div class="row">
                    <div class="col-lg-8">
                        

                        <div class="row mb-5 pb-5">
                            <div class="col-lg-12 m-auto">
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="card" style="background: transparent;border: 1px solid #ae9a66;border-radius: 8px;padding: 19px;">
                                            <div class="card-body">
                                                <p class="mb-1" style="font-size: 24px;color:#FFF;">Student {{ $serial }}</p>
                                                <p class="mb-1" style="font-size: 24px;color:#FFF;">{{ $qualification->subject_selector }}</p>
                                                <!-- <p>Subject Selector - Stage 1 of 2</p> -->
                                                <b style="color:#AE9A66;font-size:24px;">{{ $qualification->title }}</b>
                                                <p>{!! $qualification->description !!}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                $printedSubjects = [];
                                $isPackageOne = $qualification->qualification_package_id == 1;
                                $locked = $qualification->locked; // <-- This controls lock
                                @endphp

                                {{-- Core Subjects --}}
                                @if($qualification->coreSubjects->count())
                                <div class="row justify-content-start g-4 mb-4 activecore">
                                    <div class="col-12">
                                        <h4 class="text-start text-light">Core Subjects</h4>
                                    </div>
                                    @foreach($qualification->coreSubjects as $subject)
                                    @php
                                        $id = $subject->subject->id;
                                        if (in_array('core-' . $id, $printedSubjects)) continue;
                                        $printedSubjects[] = 'core-' . $id;
                                    @endphp
                                    <div class="col-lg-4 col-12">
                                        <div class="timetable-option py-5 {{ $locked ? 'active locked' : '' }}"
                                            @unless($locked) onclick="toggleSubjectSelection(this)" @endunless
                                            data-subject-id="core-{{ $id }}"
                                            data-subject-name="{{ $subject->subject->name }}">
                                            <div class="checkmark">{{ $locked ? '🔒' : '' }}</div>
                                            <h5 class="mt-4">{{ $subject->subject->name }}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                {{-- Additional Subjects --}}
                                @if($qualification->additionalSubjects->count())
                                <div class="row justify-content-start g-4 mb-4">
                                    <div class="col-12">
                                        <h4 class="text-start text-light">Free Additional Subjects</h4>
                                    </div>
                                    @foreach($qualification->additionalSubjects as $subject)
                                    @php
                                        $id = $subject->subject->id;
                                        if (in_array('sub-' . $id, $printedSubjects)) continue;
                                        $printedSubjects[] = 'sub-' . $id;
                                    @endphp
                                    <div class="col-lg-4 col-12">
                                        <div class="timetable-option py-5" onclick="toggleSubjectSelection(this)"
                                            data-subject-id="sub-{{ $id }}"
                                            data-subject-name="{{ $subject->subject->name }}">
                                            <div class="checkmark"></div>
                                            <h5 class="mt-4">{{ $subject->subject->name }}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                {{-- Islamic Subjects --}}
                                @if($qualification->additionalIslamic && $qualification->additionalIslamic->count())
                                <div class="row justify-content-start g-4 mb-4">
                                    <div class="col-12">
                                        <h4 class="text-start text-light">Free Islamic & Quranic Subject</h4>
                                    </div>
                                    @foreach($qualification->additionalIslamic as $subject)
                                    @php
                                        $id = $subject->subject->id;
                                        if (in_array('islamic-' . $id, $printedSubjects)) continue;
                                        $printedSubjects[] = 'islamic-' . $id;
                                    @endphp
                                    <div class="col-lg-4 col-12">
                                        <div class="timetable-option py-5" onclick="toggleSubjectSelection(this)"
                                            data-subject-id="islamic-{{ $id }}"
                                            data-subject-name="{{ $subject->subject->name }}">
                                            <div class="checkmark"></div>
                                            <h5 class="mt-4">{{ $subject->subject->name }}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                {{-- Language Subjects --}}
                                @if($qualification->additionalLanguages->count())
                                <div class="row justify-content-start g-4 mb-4">
                                    <div class="col-12">
                                        <h4 class="text-start text-light">Language</h4>
                                    </div>
                                    @foreach($qualification->additionalLanguages as $subject)
                                    @php
                                        $id = $subject->language->id;
                                        if (in_array('lang-' . $id, $printedSubjects)) continue;
                                        $printedSubjects[] = 'lang-' . $id;
                                    @endphp
                                    <div class="col-lg-4 col-12">
                                        <div class="timetable-option py-5" onclick="toggleSubjectSelection(this)"
                                            data-subject-id="lang-{{ $id }}"
                                            data-subject-name="{{ $subject->language->name }}">
                                            <div class="checkmark"></div>
                                            <h5 class="mt-4">{{ $subject->language->name }}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                            @if($qualification->hifdh_status==1)
                                <div class="row justify-content-start g-4 mb-4 mt-3">
                                    <div class="col-12">
                                        <h4 class="text-start text-light">Hifdh Programme</h4>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="timetable-option py-5" onclick="toggleSubjectSelection(this)"
                                            data-subject-id="hifdh-{{ $qualification->id }}"
                                            data-subject-name="{{ $qualification->hifdh_programme }}">
                                            <div class="checkmark"></div>
                                            <h5 class="mt-4">{{ $qualification->hifdh_programme }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endif





                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 ps-2">
                        <div class="info-box d-flex flex-column justify-content-center" style="background: transparent;border: 1px solid #ae9a66;border-radius: 8px;padding: 30px;">
                            <div>
                                <h4 class="mb-4">Summary</h4>
                                <div style="text-align: center;background: #0b2854;padding: 15px;color: #FFF;">
                                    <b>{{ $student->first_name ?? 'Student' }} {{ $student->last_name ?? '' }}</b><br>
                                    <span>
                                        @if($qualification->groupYear && $qualification->groupYear->group_id)
                                        {{ $qualification->groupYear->name }} {{ $qualification->groupYear->list1 }} {{ $qualification->groupYear->list2 }} {{ $qualification->groupYear->list3 }} {{ $qualification->groupYear->list4 }}
                                        @endif
                                    </span>
                                    <p>{{ $qualification->total_subjects }} Subject Package</p>

                                </div>
                                

                                <div class="px-5 py-5">
                                    <b style="color: #ae9a66;font-size: 20px;font-weight: 600;">Essentials</b>
                                    <div id="selectedSubjectsList"></div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 m-auto">
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-continue w-100" style="padding: 15px;">Continue</button>
                                    <div class="mt-3">
                                        <a href="{{ route('step7') }}" class="text-light text-decoration-none">&larr; Go Back</a>
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
document.addEventListener('DOMContentLoaded', () => {
    let selectedSubjects = [];
    let selectedHifdh = null;
    const maxSubjects = {{ $qualification->total_subjects }};
    const selectedSubjectsList = document.getElementById('selectedSubjectsList');

    window.toggleSubjectSelection = function (element) {
        if (element.classList.contains('locked')) return;

        const subjectId = element.getAttribute('data-subject-id');
        const subjectName = element.getAttribute('data-subject-name');

        const isLanguage = subjectId.startsWith('lang-');
        const isHifdh = subjectId.startsWith('hifdh-');
        const index = selectedSubjects.indexOf(subjectId);

        // Handle Language (only one)
        if (isLanguage) {
            selectedSubjects = selectedSubjects.filter(id => !id.startsWith('lang-'));
            document.querySelectorAll('.timetable-option[data-subject-id^="lang-"]').forEach(el => {
                el.classList.remove('active');
            });
            selectedSubjects.push(subjectId);
            element.classList.add('active');
        }

        // Handle Hifdh (only one)
        else if (isHifdh) {
            selectedHifdh = subjectId;

            // Deselect all Hifdh first
            document.querySelectorAll('.timetable-option[data-subject-id^="hifdh-"]').forEach(el => {
                el.classList.remove('active');
            });
            element.classList.add('active');
        }

        // Handle Other Subjects
        else {
            const currentSelectedCount = selectedSubjects.length + document.querySelectorAll('.timetable-option.locked').length;

            if (index === -1) {
                if (currentSelectedCount >= maxSubjects) {
                    alert(`You can only select ${maxSubjects} subjects.`);
                    return;
                }
                selectedSubjects.push(subjectId);
                element.classList.add('active');
            } else {
                selectedSubjects.splice(index, 1);
                element.classList.remove('active');
            }
        }

        updateSelectedSubjectsList();
    };

    function updateSelectedSubjectsList() {
        let selectedNames = [];
        let count = 1;

        // Reset checkmarks
        document.querySelectorAll('.timetable-option').forEach(el => {
            const mark = el.querySelector('.checkmark');
            if (mark) mark.textContent = '';
        });

        // Core subjects
        document.querySelectorAll('.timetable-option[data-subject-id^="core-"]').forEach(el => {
            if (el.classList.contains('locked') || el.classList.contains('active')) {
                const mark = el.querySelector('.checkmark');
                if (mark) mark.textContent = count;
                selectedNames.push(`${count++}. ${el.getAttribute('data-subject-name')}`);
            }
        });

        // Other selected subjects
        selectedSubjects.forEach(id => {
            if (id.startsWith('core-')) return;
            const el = document.querySelector(`.timetable-option[data-subject-id="${id}"]`);
            if (el) {
                const mark = el.querySelector('.checkmark');
                if (mark) mark.textContent = count;
                selectedNames.push(`${count++}. ${el.getAttribute('data-subject-name')}`);
            }
        });

        // Hifdh Programme (if selected)
        if (selectedHifdh) {
            const el = document.querySelector(`.timetable-option[data-subject-id="${selectedHifdh}"]`);
            if (el) {
                const mark = el.querySelector('.checkmark');
                if (mark) mark.textContent = count;
                selectedNames.push(`${count++}. ${el.getAttribute('data-subject-name')}`);
            }
        }

        selectedSubjectsList.innerHTML = selectedNames.join('<br>');
    }

    // Handle Form Submit
    document.getElementById('subjectSubmitForm').addEventListener('submit', function (e) {
        const coreSubjects = [], additionalSubjects = [], languages = [], islamicSubjects = [];

        document.querySelectorAll('.timetable-option[data-subject-id^="core-"]').forEach(el => {
            const id = el.getAttribute('data-subject-id');
            if (el.classList.contains('locked') || el.classList.contains('active')) {
                coreSubjects.push(id);
            }
        });

        document.querySelectorAll('.timetable-option[data-subject-id^="sub-"]').forEach(el => {
            const id = el.getAttribute('data-subject-id');
            if (selectedSubjects.includes(id)) {
                additionalSubjects.push(id);
            }
        });

        document.querySelectorAll('.timetable-option[data-subject-id^="lang-"]').forEach(el => {
            const id = el.getAttribute('data-subject-id');
            if (selectedSubjects.includes(id)) {
                languages.push(id);
            }
        });

        document.querySelectorAll('.timetable-option[data-subject-id^="islamic-"]').forEach(el => {
            const id = el.getAttribute('data-subject-id');
            if (selectedSubjects.includes(id)) {
                islamicSubjects.push(id);
            }
        });

        document.getElementById('coreSubjectsInput').value = JSON.stringify(coreSubjects);
        document.getElementById('additionalSubjectsInput').value = JSON.stringify(additionalSubjects);
        document.getElementById('languagesInput').value = JSON.stringify(languages);
        document.getElementById('islamicSubjectsInput').value = JSON.stringify(islamicSubjects);

        // Hifdh Programme
        document.getElementById('hifdhProgrammesInput').value = JSON.stringify(selectedHifdh ? [selectedHifdh] : []);
    });

    updateSelectedSubjectsList();
});
</script>
@endsection
@endsection