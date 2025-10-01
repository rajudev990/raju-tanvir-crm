@extends('student.app')

@section('student')

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <!-- Progress Header (Original Design) -->
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
            <div class="col-lg-6 step-four m-auto">
                <h3 class="text-center" style="color: #AE9A66;font-size:24px;font-weight:500;">Choose a Pricing Package That Suits You Best</h3>
            </div>
        </div>
        @include('errors.validation')
        <form action="{{ route('form.step.post', 6) }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-center">
                <!-- Parent Info -->
                <div class="col-lg-12">
                    <div class="card p-4 mb-3" style="background-color:#0c2a58;border-radius:16px;">
                        <div class="card-bodyr">
                            <h3 class="py-3" style="color:#FFF;font-size: 24px;font-weight: 600;text-align:center;">Parents Information</h3>

                            <div class="row">
                                <div class="col-lg-8  m-auto">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Name: </span>{{ $data['title'] ?? '' }} {{ $data['fname'] ?? '' }} {{ $data['lname'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Email: </span>{{ $data['email'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Phone: </span>{{ $data['mobile_number'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Parent Type: </span>{{ $data['relationship'] ?? '' }}</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Country: </span>{{ $data['country'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">City: </span>{{ $data['city'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Postal Code: </span>{{ $data['postal_code'] ?? '' }}</p>
                                            <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Address: </span>{{ $data['address'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <a class="btn text-center" style="background: #AE9A66;padding:15px 24px;border-radius:99px;font-size:16px;font-weight:600;color:#FFF;"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Parent Infor -->

                <!-- Multiple Student -->
                @if(!empty($data['students']) && is_array($data['students']))
                @foreach($data['students'] as $index => $student)
                <div class="col-lg-6">
                    <div class="card p-4 mb-3" style="background-color:#0c2a58;border-radius:16px;">
                        <div class="card-bodyr">
                            <h3 class="py-3" style="color:#FFF;font-size: 24px;font-weight: 600;">Student {{ ++$index }} Information</h3>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Name: </span>{{ $student['fname'] ?? '' }} {{ $student['lname'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Date of Birth: </span>{{ $student['dob'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Nationality: </span>{{ $student['nationality'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Start Date: </span>{{ $student['start_date'] ?? '' }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Group: </span>{{ $student['group']['name'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Year: </span>{{ $student['course']['year']['name'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Time Table: </span>{{ $data['selected_school'] ?? '' }}</p>
                                    <p style="font-size: 20px;font-weight:400;color:#FFF;"><span style="color: #AE9A66;">Package: </span>{{ $student['course']['package']['name'] ?? '' }}</p>
                                </div>



                                @if(!empty($student['core_subjects']))
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group mb-4">
                                        <label style="font-size:20px;font-weight:500;color:#AE9A66;">Core Subjects</label>
                                        <div>
                                            @foreach(explode(',', $student['core_subjects']) as $subject)
                                            <span class="badge mb-2"
                                                style="background-color:#183e77;
                                                                        border-radius:999px;
                                                                        padding:10px 15px;
                                                                        font-size:16px;
                                                                        color:#FFF;">
                                                {{ trim($subject) }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($student['islamic_subjects']))
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group mb-4">
                                        <label style="font-size:20px;font-weight:500;color:#AE9A66;">Free Islamic Subject</label>
                                        <div>
                                            @foreach(explode(',', $student['islamic_subjects']) as $subject)
                                            <span class="badge mb-2"
                                                style="background-color:#183e77;
                                                                        border-radius:999px;
                                                                        padding:10px 15px;
                                                                        font-size:16px;
                                                                        color:#FFF;">
                                                {{ trim($subject) }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($student['additional_subject']))
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group mb-4">
                                        <label style="font-size:20px;font-weight:500;color:#AE9A66;">Additional Subjects</label>
                                        <div>
                                            @foreach(explode(',', $student['additional_subject']) as $subject)
                                            <span class="badge mb-2"
                                                style="background-color:#183e77;
                                                                        border-radius:999px;
                                                                        padding:10px 15px;
                                                                        font-size:16px;
                                                                        color:#FFF;">
                                                {{ trim($subject) }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($student['hifdh_subjects']))
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group mb-4">
                                        <label style="font-size:20px;font-weight:500;color:#AE9A66;">Additional Hifdh/Hifz Curriculum</label>
                                        <div>
                                            @foreach(explode(',', $student['hifdh_subjects']) as $subject)
                                            <span class="badge mb-2"
                                                style="background-color:#183e77;
                                                                        border-radius:999px;
                                                                        padding:10px 15px;
                                                                        font-size:16px;
                                                                        color:#FFF;">
                                                {{ trim($subject) }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if(!empty($student['language_subjects']))
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group mb-4">
                                        <label style="font-size:20px;font-weight:500;color:#AE9A66;">Language</label>
                                        <div>
                                            @foreach(explode(',', $student['language_subjects']) as $subject)
                                            <span class="badge mb-2"
                                                style="background-color:#183e77;
                                                                        border-radius:999px;
                                                                        padding:10px 15px;
                                                                        font-size:16px;
                                                                        color:#FFF;">
                                                {{ trim($subject) }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif



                            </div>
                            <div class="mt-3">
                                <a class="btn text-center" style="background: #AE9A66;padding:15px 24px;border-radius:99px;font-size:16px;font-weight:600;color:#FFF;"><i class="fa fa-edit"></i> Edit</a>
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                <!-- Multiple Student -->
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 m-auto">
                    <div class="d-flex justify-content-between mb-5">
                        <a href="#" class="btn custom-btn w-100 me-3" style="border-radius:8px;">View Terms and Condition</a>
                        <input name="signature"
                            type="text"
                            class="form-control"
                            placeholder="Your Signature here"
                            style="background-color:#FFF !important;color:#000 !important;"
                            value="{{ old('signature', $data['signature'] ?? '') }}">
                    </div>

                    



                    <!-- <div class="mb-5 text-light">
                        <input type="checkbox"> I have read and agree to the Terms & Conditions.
                    </div> -->

                    <!-- Terms Checkmark -->
                    <div class="form-check mb-4 ps-0">
                        <!-- Checkbox HTML -->
                        
                        <label class="custom-check" style="color:#FFF;">
                            I have read and agree to the Terms & Conditions.
                            <input type="checkbox"
                                required
                                name="signature_accept"
                                value="yes"
                                {{ old('signature_accept', $data['signature_accept'] ?? '') == 'yes' ? 'checked' : '' }}>
                            <span class="custom-checkmark"></span>
                        </label>
                    </div>


                    <button type="submit" class="btn custom-btn w-100">Continue</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('form.step', 5) }}" class="text-light text-decoration-none"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



@endsection