@extends('student.app')

@section('title','Edit Child Information')

@section('student')
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="progress-container mb-4">
                    <h5 class="mb-0 text-light title">Estimated time remaining: 12 minutes</h5>
                    <div class="progress mt-2">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 10%;"></div>
                    </div>
                    <small id="progressText" class="text-light">10%</small>
                </div>
            </div>
        </div>


        @include('errors.validation')
        <form action="{{ route('parents-update.form', $student['id']) }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            @method('put')
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div id="studentsContainer">



                       
                        <div class="card p-4 mb-3 student-card position-relative" style="background-color:#0c2a58;border-radius:24px;color:#FFF;">
                            
                            <div class="card-body">
                                <h3 class="text-center mb-5" style="color: #AE9A66;font-size: 24px;font-weight: 600;">
                                    Tell us about your child {{ $student['fname'] ?? '' }}
                                </h3>
                                <div class="row">
                                    {{-- First Name --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>First Name<span class="text-danger">*</span></label>
                                            <input type="text" name="fname[]" class="form-control" value="{{ $student['fname'] ?? '' }}" placeholder="First name here" required>
                                        </div>
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Last Name<span class="text-danger">*</span></label>
                                            <input type="text" name="lname[]" class="form-control" value="{{ $student['lname'] ?? '' }}" placeholder="Last name here" required>
                                        </div>
                                    </div>
                                    {{-- DOB --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>DOB<span class="text-danger">*</span></label>
                                            <input type="date" name="dob[]" class="form-control" value="{{ $student['dob'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    {{-- Gender --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Gender<span class="text-danger">*</span></label>
                                            <select name="gender[]" class="form-control form-select" required>
                                                <option value="">-- Select --</option>
                                                <option value="Male" {{ ($student['gender'] ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ ($student['gender'] ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Others" {{ ($student['gender'] ?? '') == 'Others' ? 'selected' : '' }}>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Nationality --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Nationality<span class="text-danger">*</span></label>
                                            <select name="nationality[]" class="form-control form-select" required>
                                                <option value="">-- Select --</option>
                                                @foreach(['Bangladeshi','Indian','Pakistani','Nepali','Sri Lankan','Bhutanese','Maldivian','Other'] as $nation)
                                                <option value="{{ $nation }}" {{ ($student['nationality'] ?? '') == $nation ? 'selected' : '' }}>{{ $nation }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Desired Start Date --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Desired Start Date<span class="text-danger">*</span></label>
                                            <select name="start_date[]" class="form-control form-select" required>
                                                <option value="">-- Select --</option>
                                                @foreach(['12/12/2025','12/12/2026','12/12/2027'] as $date)
                                                <option value="{{ $date }}" {{ ($student['start_date'] ?? '') == $date ? 'selected' : '' }}>{{ $date }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    {{-- Group --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Group<span class="text-danger">*</span></label>
                                            <select name="group_id[]" class="form-control form-select group-select"
                                                data-selected="{{ $student['group_id'] ?? '' }}" required>
                                                <option value="">-- Select --</option>
                                                @foreach($groups as $g)
                                                <option value="{{ $g->id }}"
                                                    {{ ($student['group_id'] ?? '') == $g->id ? 'selected' : '' }}>
                                                    {{ $g->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Year --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label>Year<span class="text-danger">*</span></label>
                                            <select name="year_id[]" class="form-control form-select year-select"
                                                data-selected="{{ $student['year_id'] ?? '' }}" required>
                                                <option value="">-- Select --</option>
                                                @if(!empty($student['year_id']))
                                                <option value="{{ $student['year_id'] }}" selected>
                                                    {{ $student['year_name'] ?? 'Selected Year' }}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Package --}}
                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label>Package<span class="text-danger">*</span></label>
                                            <select name="package_id[]" class="form-control form-select package-select"
                                                data-selected="{{ $student['package_id'] ?? '' }}" required>
                                                <option value="">-- Select --</option>
                                                @if(!empty($student['package_id']))
                                                <option value="{{ $student['package_id'] }}" selected>
                                                    {{ $student['package_name'] ?? 'Selected Package' }}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    {{-- Subjects Divs --}}
                                    <div class="col-lg-12 coreSubjectsDiv" style="display:none;">
                                        <div class="form-group mb-4">
                                            <label>Core Subjects</label>
                                            <div class="subjectsContainer"></div>
                                            <input type="hidden" name="core_subject[]" class="core-subjects-input" value="{{ $student['core_subject'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 islamicSubjectsDiv" style="display:none;">
                                        <div class="form-group mb-4">
                                            <label>Islamic Subjects</label>
                                            <div class="subjectsContainer"></div>
                                            <input type="hidden" name="islamic_subject[]" class="islamic-subjects-input" value="{{ $student['islamic_subject'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 additionalSubjectsDiv" style="display:none;">
                                        <div class="form-group mb-4">
                                            <label>Additional Subjects</label>
                                            <div class="subjectsContainer"></div>
                                            <input type="hidden" name="additional_subject[]" class="additional-subjects-input" value="{{ $student['additional_subject'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 languageDiv" style="display:none;">
                                        <div class="form-group mb-4">
                                            <label>Languages</label>
                                            <div class="subjectsContainer"></div>
                                            <input type="hidden" name="language[]" class="language-subjects-input" value="{{ $student['language'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 hifdhDiv" style="display:none;">
                                        <div class="form-group mb-4">
                                            <label>Hifdh Subjects</label>
                                            <div class="subjectsContainer"></div>
                                            <input type="hidden" name="hifdh_subject[]" class="hifdh-subjects-input" value="{{ $student['hifdh_subject'] ?? '' }}">
                                        </div>
                                        <label class="custom-check">
                                            <input type="checkbox" name="hifdh_option[]" {{ ($student['hifdh'] ?? 0) ? 'checked' : '' }}>
                                            <span class="custom-checkmark"></span>
                                            <span class="text-light" id="hifdhText">{{ $student['hifdh_text'] ?? '' }}</span>
                                        </label>
                                    </div>

                                    {{-- Documents --}}
                                    <div class="col-lg-12 mt-3">
                                        <div class="card">
                                            <div class="card-body text-dark">
                                                <h3>Documents<span class="text-danger">*</span></h3>
                                                <ol>
                                                    <li>Proof of ID (Passport, Birth Certificate, National ID)</li>
                                                    <li>Previous Academic Years Report</li>
                                                </ol>
                                                <div class="row">
                                                    <div class="col-lg-6 text-center">
                                                        <label class="form-label d-block">Proof Of Parents ID</label>
                                                        <input type="file" class="d-none parent-file1" name="student_file1[]">
                                                        <label class="btn form-control" style="background: #061E42;color:#FFF;">Choose File <i class="fas fa-plus"></i></label>
                                                        <div class="fileName mt-2 text-muted">No file chosen yet</div>
                                                    </div>
                                                    <div class="col-lg-6 text-center">
                                                        <label class="form-label d-block">Proof Of Parents ID</label>
                                                        <input type="file" class="d-none parent-file2" name="student_file2[]">
                                                        <label class="btn form-control" style="background: #061E42;color:#FFF;">Choose File <i class="fas fa-plus"></i></label>
                                                        <div class="fileName mt-2 text-muted">No file chosen yet</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- row -->
                            </div>
                        </div>
                        

              


                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-10 m-auto">
                    
                    <button type="submit" class="btn custom-btn w-100">Update</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('form.step', 6) }}" class="text-light text-decoration-none"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
@endsection

@section('script')
<script>
$(document).ready(function() {

    // Cache to avoid repeated AJAX calls on load
    const cache = {
        years: {},
        packages: {},
        courseDetails: {}
    };

    async function initCard(card, fromDB = false) {
        let groupSelect = card.find('.group-select');
        let yearSelect = card.find('.year-select');
        let packageSelect = card.find('.package-select');

        // saved values শুধুমাত্র database থেকে আসলে use হবে
        let savedGroup = fromDB ? groupSelect.data('selected') : '';
        let savedYear = fromDB ? yearSelect.data('selected') : '';
        let savedPackage = fromDB ? packageSelect.data('selected') : '';

        // Populate years for a group
        async function loadYears(group_id) {
            yearSelect.html('<option value="">-- Select --</option>');
            packageSelect.html('<option value="">-- Select --</option>');
            card.find('.coreSubjectsDiv,.islamicSubjectsDiv,.additionalSubjectsDiv,.languageDiv,.hifdhDiv')
                .hide().find('.subjectsContainer').html('');
            card.find('#hifdhText').text('');

            if (!group_id) return;

            let data;
            if (cache.years[group_id]) {
                data = cache.years[group_id];
            } else {
                data = await $.get(`/get-years/${group_id}`);
                cache.years[group_id] = data;
            }

            data.forEach(y => {
                let selected = (y.id == savedYear) ? 'selected' : '';
                yearSelect.append(`<option value="${y.id}" ${selected}>${y.name}</option>`);
            });

            if (savedYear) await loadPackages(group_id, savedYear);
        }

        // Populate packages for group + year
        async function loadPackages(group_id, year_id) {
            packageSelect.html('<option value="">-- Select --</option>');
            card.find('.coreSubjectsDiv,.islamicSubjectsDiv,.additionalSubjectsDiv,.languageDiv,.hifdhDiv')
                .hide().find('.subjectsContainer').html('');
            card.find('#hifdhText').text('');

            if (!group_id || !year_id) return;

            let key = `${group_id}-${year_id}`;
            let data;
            if (cache.packages[key]) {
                data = cache.packages[key];
            } else {
                data = await $.get(`/get-packages/${group_id}/${year_id}`);
                cache.packages[key] = data;
            }

            data.forEach(p => {
                let selected = (p.id == savedPackage) ? 'selected' : '';
                packageSelect.append(`<option value="${p.id}" ${selected}>${p.name}</option>`);
            });

            if (savedPackage) await loadCourseDetails(group_id, year_id, savedPackage);
        }

        // Populate subjects for group + year + package
        async function loadCourseDetails(group_id, year_id, package_id) {
            card.find('.coreSubjectsDiv,.islamicSubjectsDiv,.additionalSubjectsDiv,.languageDiv,.hifdhDiv')
                .hide().find('.subjectsContainer').html('');
            card.find('#hifdhText').text('');

            if (!group_id || !year_id || !package_id) return;

            let key = `${group_id}-${year_id}-${package_id}`;
            let data;
            if (cache.courseDetails[key]) {
                data = cache.courseDetails[key];
            } else {
                data = await $.get('/get-course-details', { group_id, year_id, package_id });
                cache.courseDetails[key] = data;
            }

            let savedCore = fromDB ? (card.find('.core-subjects-input').val() || '').split(',') : [];
            let savedIslamic = fromDB ? (card.find('.islamic-subjects-input').val() || '').split(',') : [];
            let savedAdditional = fromDB ? (card.find('.additional-subjects-input').val() || '').split(',') : [];
            let savedLang = fromDB ? (card.find('.language-subjects-input').val() || '').split(',') : [];
            let savedHifdh = fromDB ? (card.find('.hifdh-subjects-input').val() || '').split(',') : [];

            function renderSubjects(div, subjects, savedArr) {
                if (Array.isArray(subjects) && subjects.length) {
                    subjects.forEach(sub => {
                        let active = savedArr.includes(sub) ? 'active' : '';
                        card.find(`${div} .subjectsContainer`)
                            .append(`<span class="badge mb-1 me-2 fs-6 subject-badge ${active}" 
                            style="background:#AE9A66;cursor:pointer;" data-value="${sub}">${sub}</span>`);
                    });
                    card.find(div).show();
                }
            }

            renderSubjects('.coreSubjectsDiv', data.core_subject, savedCore);
            renderSubjects('.islamicSubjectsDiv', data.islamic_subject, savedIslamic);
            renderSubjects('.additionalSubjectsDiv', data.additional_subject, savedAdditional);
            renderSubjects('.languageDiv', data.language, savedLang);

            if (data.hifdh == 1) {
                let active = savedHifdh.includes('Hifdh') ? 'active' : '';
                card.find('.hifdhDiv .subjectsContainer')
                    .html(`<span class="badge mb-1 me-2 fs-6 subject-badge ${active}" 
                        style="background:#AE9A66;cursor:pointer;" data-value="Hifdh">Hifdh</span>`);
                card.find('#hifdhText').text(data.hifdh_text || '');
                card.find('.hifdhDiv').show();
            }
        }

        // Event bindings
        groupSelect.off('change').on('change', function() {
            savedYear = '';
            savedPackage = '';
            loadYears($(this).val());
        });

        yearSelect.off('change').on('change', function() {
            savedPackage = '';
            loadPackages(groupSelect.val(), $(this).val());
        });

        packageSelect.off('change').on('change', function() {
            loadCourseDetails(groupSelect.val(), yearSelect.val(), $(this).val());
        });

        // Subject badge click
        card.off('click', '.subject-badge').on('click', '.subject-badge', function() {
            $(this).toggleClass('active');
            let mappings = [
                { div: '.coreSubjectsDiv', input: '.core-subjects-input' },
                { div: '.islamicSubjectsDiv', input: '.islamic-subjects-input' },
                { div: '.additionalSubjectsDiv', input: '.additional-subjects-input' },
                { div: '.languageDiv', input: '.language-subjects-input' },
                { div: '.hifdhDiv', input: '.hifdh-subjects-input' },
            ];
            mappings.forEach(m => {
                let values = [];
                card.find(`${m.div} .subject-badge.active`).each(function() {
                    values.push($(this).data('value'));
                });
                card.find(m.input).val(values.join(','));
            });
        });

        // File preview
        card.find('input[type="file"]').off('change').on('change', function(e) {
            let fileName = e.target.files.length ? e.target.files[0].name : "No file chosen yet";
            $(this).closest('.col-lg-6').find('.fileName').text(fileName);
        });

        // Auto load if fromDB
        if (fromDB && savedGroup) {
            await loadYears(savedGroup);
        }
    }

    // Existing cards (database data) → init with fromDB = true
    $('#studentsContainer .student-card').each(function() {
        initCard($(this), true);
    });

    
});
</script>


@endsection