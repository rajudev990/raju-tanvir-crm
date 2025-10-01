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
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 30%;"></div>
                    </div>
                    <small id="progressText" class="text-light">30%</small>
                </div>
            </div>
        </div>
        @include('errors.validation')
       <form action="{{ route('form.step.post', 2) }}" method="POST" enctype="multipart/form-data" id="from">
        @csrf

        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">

                {{-- ===================== PRIMARY GUARDIAN ===================== --}}
                <div class="card p-4 mb-3" style="background-color:#0c2a58;border-radius:24px;color:#FFF;">
                    <div class="card-body">
                        <h3 class="text-center mb-5" style="color: #AE9A66;font-size: 24px;font-weight: 600;">
                            Primary Parent / Guardian Information
                        </h3>

                        <div class="row">
                            {{-- Title --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label for="title">Title</label>
                                    <select name="title" id="title" class="form-control form-select" required>
                                        <option value="">-- Select --</option>
                                        @foreach(['Mr','Mrs','Miss','Ms','Mx','Dr','Prof','Rev','Sir','Dame','Lady','Lord'] as $title)
                                            <option value="{{ $title }}" {{ old('title', $data['title'] ?? '') == $title ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- First Name --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label for="fname">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fname" class="form-control"
                                           value="{{ old('fname', $data['fname'] ?? '') }}" required>
                                    @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Last Name --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label for="lname">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lname" class="form-control"
                                           value="{{ old('lname', $data['lname'] ?? '') }}" required>
                                    @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Relationship --}}
                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label for="relationship">Relationship to Student(s) <span class="text-danger">*</span></label>
                                    <select name="relationship" id="relationship" class="form-control form-select" required>
                                        <option value="">-- Select --</option>
                                        @foreach(['Father','Mother','Step-Father','Step-Mother','Guardian','Brother','Sister','Uncle','Aunt','Grandfather','Grandmother','Other'] as $rel)
                                            <option value="{{ $rel }}" {{ old('relationship', $data['relationship'] ?? '') == $rel ? 'selected' : '' }}>
                                                {{ $rel }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('relationship') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Contact --}}
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{ old('email', $data['email'] ?? '') }}" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Confirm Email <span class="text-danger">*</span></label>
                                    <input type="email" name="confirm_email" class="form-control"
                                           value="{{ old('confirm_email', $data['confirm_email'] ?? '') }}" required>
                                    @error('confirm_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile_number" class="form-control"
                                           value="{{ old('mobile_number', $data['mobile_number'] ?? '') }}" required>
                                    @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Home Telephone</label>
                                    <input type="text" name="home_telephone" class="form-control"
                                           value="{{ old('home_telephone', $data['home_telephone'] ?? '') }}">
                                    @error('home_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Work Number</label>
                                    <input type="text" name="work_number" class="form-control"
                                           value="{{ old('work_number', $data['work_number'] ?? '') }}">
                                    @error('work_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Street Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control"
                                           value="{{ old('address', $data['address'] ?? '') }}" required>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Apartment/Suite</label>
                                    <input type="text" name="apartment" class="form-control"
                                           value="{{ old('apartment', $data['apartment'] ?? '') }}">
                                    @error('apartment') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>City <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control"
                                           value="{{ old('city', $data['city'] ?? '') }}" required>
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>State/Province <span class="text-danger">*</span></label>
                                    <input type="text" name="province" class="form-control"
                                           value="{{ old('province', $data['province'] ?? '') }}" required>
                                    @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Zip/Postal Code <span class="text-danger">*</span></label>
                                    <input type="text" name="postal_code" class="form-control"
                                           value="{{ old('postal_code', $data['postal_code'] ?? '') }}" required>
                                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <input type="text" name="country" class="form-control"
                                           value="{{ old('country', $data['country'] ?? '') }}" required>
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- File Upload --}}
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                    <div class="card-body text-dark">
                                        <h3>Documents <span class="text-danger">*</span></h3>
                                        <ol>
                                            <li>Proof of ID (Passport, Birth Certificate, NID)</li>
                                            <li>Previous Academic Progress Report</li>
                                        </ol>

                                        <div class="row">
                                            <div class="col-lg-6 text-center">
                                                <label class="form-label d-block">Parent's ID Proof</label>
                                                <input type="file" name="file1" id="file1" class="d-none">
                                                <label for="file1" class="btn form-control" style="background:#061E42;color:#FFF;">
                                                    Choose File
                                                </label>
                                                <div id="file1Name" class="mt-2 text-muted">
                                                    {{ old('file1') ?? 'No file chosen yet' }}
                                                </div>
                                                @error('file1') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-lg-6 text-center">
                                                <label class="form-label d-block">Progress Report</label>
                                                <input type="file" name="file2" id="file2" class="d-none">
                                                <label for="file2" class="btn form-control" style="background:#061E42;color:#FFF;">
                                                    Choose File
                                                </label>
                                                <div id="file2Name" class="mt-2 text-muted">
                                                    {{ old('file2') ?? 'No file chosen yet' }}
                                                </div>
                                                @error('file2') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>{{-- row end --}}
                    </div>
                </div>

                {{-- ===================== SECONDARY GUARDIAN ===================== --}}
                <div class="card p-4 mb-3" style="background-color:#0c2a58;border-radius:24px;color:#FFF;">
                    <div class="card-body">
                        <h3 class="text-center mb-5" style="color: #AE9A66;font-size: 24px;font-weight: 600;">
                            Secondary Parent / Guardian (Optional)
                        </h3>

                        <div class="row">
                            {{-- Title --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Title</label>
                                    <select name="secondary_title" class="form-control form-select">
                                        <option value="">-- Select --</option>
                                        @foreach(['Mr','Mrs','Miss','Ms','Mx','Dr','Prof','Rev','Sir','Dame','Lady','Lord'] as $title)
                                            <option value="{{ $title }}" {{ old('secondary_title', $data['secondary_title'] ?? '') == $title ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('secondary_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- First Name --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>First Name</label>
                                    <input type="text" name="secondary_fname" class="form-control"
                                        value="{{ old('secondary_fname', $data['secondary_fname'] ?? '') }}">
                                    @error('secondary_fname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Last Name --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Last Name</label>
                                    <input type="text" name="secondary_lname" class="form-control"
                                        value="{{ old('secondary_lname', $data['secondary_lname'] ?? '') }}">
                                    @error('secondary_lname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Relationship --}}
                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label>Relationship to Student(s)</label>
                                    <select name="secondary_relationship" class="form-control form-select">
                                        <option value="">-- Select --</option>
                                        @foreach(['Father','Mother','Step-Father','Step-Mother','Guardian','Brother','Sister','Uncle','Aunt','Grandfather','Grandmother','Other'] as $rel)
                                            <option value="{{ $rel }}" {{ old('secondary_relationship', $data['secondary_relationship'] ?? '') == $rel ? 'selected' : '' }}>
                                                {{ $rel }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('secondary_relationship') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Contact --}}
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Email Address</label>
                                    <input type="email" name="secondary_email" class="form-control"
                                        value="{{ old('secondary_email', $data['secondary_email'] ?? '') }}">
                                    @error('secondary_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Confirm Email</label>
                                    <input type="email" name="secondary_confirm_email" class="form-control"
                                        value="{{ old('secondary_confirm_email', $data['secondary_confirm_email'] ?? '') }}">
                                    @error('secondary_confirm_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Mobile Number</label>
                                    <input type="text" name="secondary_mobile_number" class="form-control"
                                        value="{{ old('secondary_mobile_number', $data['secondary_mobile_number'] ?? '') }}">
                                    @error('secondary_mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Home Telephone</label>
                                    <input type="text" name="secondary_home_telephone" class="form-control"
                                        value="{{ old('secondary_home_telephone', $data['secondary_home_telephone'] ?? '') }}">
                                    @error('secondary_home_telephone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-4">
                                    <label>Work Number</label>
                                    <input type="text" name="secondary_work_number" class="form-control"
                                        value="{{ old('secondary_work_number', $data['secondary_work_number'] ?? '') }}">
                                    @error('secondary_work_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Street Address</label>
                                    <input type="text" name="secondary_address" class="form-control"
                                        value="{{ old('secondary_address', $data['secondary_address'] ?? '') }}">
                                    @error('secondary_address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Apartment/Suite</label>
                                    <input type="text" name="secondary_apartment" class="form-control"
                                        value="{{ old('secondary_apartment', $data['secondary_apartment'] ?? '') }}">
                                    @error('secondary_apartment') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>City</label>
                                    <input type="text" name="secondary_city" class="form-control"
                                        value="{{ old('secondary_city', $data['secondary_city'] ?? '') }}">
                                    @error('secondary_city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>State/Province</label>
                                    <input type="text" name="secondary_province" class="form-control"
                                        value="{{ old('secondary_province', $data['secondary_province'] ?? '') }}">
                                    @error('secondary_province') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Zip/Postal Code</label>
                                    <input type="text" name="secondary_postal_code" class="form-control"
                                        value="{{ old('secondary_postal_code', $data['secondary_postal_code'] ?? '') }}">
                                    @error('secondary_postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label>Country</label>
                                    <input type="text" name="secondary_country" class="form-control"
                                        value="{{ old('secondary_country', $data['secondary_country'] ?? '') }}">
                                    @error('secondary_country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- File Upload --}}
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                    <div class="card-body text-dark">
                                        <h3>Documents</h3>
                                        <ol>
                                            <li>Proof of ID (Passport, Birth Certificate, NID)</li>
                                            <li>Previous Academic Progress Report</li>
                                        </ol>

                                        <div class="row">
                                            <div class="col-lg-6 text-center">
                                                <label class="form-label d-block">Parent's ID Proof</label>
                                                <input type="file" name="file3" id="file3" class="d-none">
                                                <label for="file3" class="btn form-control" style="background:#061E42;color:#FFF;">
                                                    Choose File
                                                </label>
                                                <div id="file3Name" class="mt-2 text-muted">
                                                    {{ old('file3') ?? 'No file chosen yet' }}
                                                </div>
                                                @error('file3') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-lg-6 text-center">
                                                <label class="form-label d-block">Progress Report</label>
                                                <input type="file" name="file4" id="file4" class="d-none">
                                                <label for="file4" class="btn form-control" style="background:#061E42;color:#FFF;">
                                                    Choose File
                                                </label>
                                                <div id="file4Name" class="mt-2 text-muted">
                                                    {{ old('file4') ?? 'No file chosen yet' }}
                                                </div>
                                                @error('file4') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- ===================== END SECONDARY GUARDIAN ===================== --}}

            </div>
        </div>

        {{-- Submit + Back --}}
        <div class="row mt-3">
            <div class="col-lg-10 m-auto">
                <button type="submit" class="btn custom-btn w-100">Continue</button>
                <div class="text-center mt-4">
                    <a href="{{ route('form.step', 1) }}" class="text-light text-decoration-none">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
                </div>
            </div>
        </div>
       </form>
    </div>
</section>

@endsection

@section('script')
<script>
    // File preview
    ['file1','file2','file3','file4'].forEach(function(id){
        document.getElementById(id).addEventListener('change', function(e){
            let fileName = e.target.files.length ? e.target.files[0].name : "No file chosen yet";
            document.getElementById(id+'Name').textContent = fileName;
        });
    });
    
</script>
@endsection
