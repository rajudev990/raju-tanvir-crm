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
                    <small id="progressText" class="text-light">8%</small>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('form.step.post', 4) }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-lg-11">
                    <div id="studentsContainer">
                        <div class="card p-4 mb-3 " style="background-color:#0c2a58;border-radius:24px;color:#FFF;">
                            <div class="card-body">
                                <h3 class="text-center mb-5" style="color: #AE9A66;font-size: 24px;font-weight: 600;">Additional Information</h3>
                                <!-- Row -->
                                <div class="row">


                                    <div class="col-md-7">
                                        <label class="form-label d-block">
                                            An Education & Health Care plan (EHCP) is a formal document
                                            detailing a child's learning difficulties and the help they will be
                                            given. Does the child have an Education Health Care Plan?
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="d-flex gap-3">
                                            <div>
                                                <input type="radio" class="custom-radio" id="yes" name="health_care" value="1"
                                                    {{ (isset($data['health_care']) && $data['health_care'] == 1) ? 'checked' : '' }}>
                                                <label for="yes" class="text-light">Yes</label>
                                            </div>
                                            <div>
                                                <input type="radio" class="custom-radio" id="no" name="health_care" value="0"
                                                    {{ (isset($data['health_care']) && $data['health_care'] == 0) ? 'checked' : '' }}>
                                                <label for="no" class="text-light">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label d-block w-492px h-63">
                                            Permanent Exclusions : Has this child been permanently excluded (expelled)
                                            from their previous school?
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="d-flex gap-3">
                                            <div>
                                                <input type="radio" class="custom-radio" id="ayes" name="previus_school" value="1"
                                                    {{ (isset($data['previus_school']) && $data['previus_school'] == 1) ? 'checked' : '' }}>
                                                <label for="ayes" class="text-light">Yes</label>
                                            </div>
                                            <div>
                                                <input type="radio" class="custom-radio" id="ano" name="previus_school" value="0"
                                                    {{ (isset($data['previus_school']) && $data['previus_school'] == 0) ? 'checked' : '' }}>
                                                <label for="ano" class="text-light">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="col-md-8 text-light mb-0 mt-3">
                                        <label class="form-label">
                                            Fair Access Protocol: (Checkboxes option for the list below) -
                                            Does the child fall under any of the below listed categories of the Fair Access Protocol?
                                            <span class="text-danger">*</span>
                                        </label>
                                    </p>

                                    <div class="col-md-12 mt-3">
                                        <div>
                                            <input type="radio" class="custom-radio" id="yes_1" name="access_protocol" value="0" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 0) ? 'checked' : '' }}>
                                            <label for="yes_1" class="text-light">Children subject to a child in need plan or a child protection plan within the last 12 months</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_2" name="access_protocol" value="1" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 1) ? 'checked' : '' }}>
                                            <label for="yes_2" class="text-light">Children living in a refuge</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_3" name="access_protocol" value="2" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 2) ? 'checked' : '' }}>
                                            <label for="yes_3" class="text-light">Children from the criminal justice system</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_4" name="access_protocol" value="3" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 3) ? 'checked' : '' }}>
                                            <label for="yes_4" class="text-light">Children who are carers</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_5" name="access_protocol" value="4" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 4) ? 'checked' : '' }}>
                                            <label for="yes_5" class="text-light">Children who are homeless</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_6" name="access_protocol" value="5" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 5) ? 'checked' : '' }}>
                                            <label for="yes_6" class="text-light">Children in formal kinship care arrangements</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_7" name="access_protocol" value="6" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 6) ? 'checked' : '' }}>
                                            <label for="yes_7" class="text-light">Children of, or who are, Gypsies, Roma or Travellers</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_8" name="access_protocol" value="7" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 7) ? 'checked' : '' }}>
                                            <label for="yes_8" class="text-light">Children who are refugees or asylum seekers</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_9" name="access_protocol" value="8" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 8) ? 'checked' : '' }}>
                                            <label for="yes_9" class="text-light">Children who have been out of education for four weeks or more</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_10" name="access_protocol" value="9" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 9) ? 'checked' : '' }}>
                                            <label for="yes_10" class="text-light">None</label>
                                        </div>
                                        <div>
                                            <input class="custom-radio" type="radio" id="yes_11" name="access_protocol" value="10" {{ (isset($data['access_protocol']) && $data['access_protocol'] == 10) ? 'checked' : '' }}>
                                            <label for="yes_11" class="text-light">Other</label>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="form-label">If any of these apply, provide the supporting local authority</label>
                                                <input type="text" name="authority" class="form-control" placeholder="Local Authority" value="{{ $data['authority'] ?? '' }}">
                                            </div>
                                        </div>




                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="form-label">Provide the name of the assigned social worker*</label>

                                                <input type="text" name="assigned" class="form-control" placeholder="Name" value="{{ $data['assigned'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label class="form-label d-block w-492px h-63">
                                                Special Educational Needs and Disabilities: Is this child on the special educational needs and disabilities code of practice
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="d-flex gap-3">
                                                <div>
                                                    <input type="radio" class="custom-radio" name="special_education" value="1"
                                                        {{ (isset($data['special_education']) && $data['special_education']==1) ? 'checked' : '' }}>
                                                    <label for="ehcp_yes" class="text-light">Yes</label>
                                                </div>
                                                <div>
                                                    <input type="radio" class="custom-radio" name="special_education" value="0"
                                                        {{ (isset($data['special_education']) && $data['special_education']==0) ? 'checked' : '' }}>
                                                    <label for="ehcp_no" class="text-light">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label d-block w-492px h-63">
                                                Medical Conditions: Does the child have any long term medical conditions? 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="d-flex gap-3">
                                                <div>
                                                    <input type="radio" class="custom-radio" name="medical_condition" value="1"
                                                        {{ (isset($data['medical_condition']) && $data['medical_condition']==1) ? 'checked' : '' }}>
                                                    <label for="ehcp_yes_1" class="text-light">Yes</label>
                                                </div>
                                                <div>
                                                    <input type="radio" class="custom-radio" name="medical_condition" value="0"
                                                        {{ (isset($data['medical_condition']) && $data['medical_condition']==0) ? 'checked' : '' }}>
                                                    <label for="ehcp_yes_2" class="text-light">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label class="form-label d-block w-492px h-63">
                                                Direct Placements: Has the child been directed to an Alternative Provision to improve their behaviour?
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="d-flex gap-3">
                                                <div>
                                                    <input type="radio" class="custom-radio" name="direct_placement" value="1"
                                                        {{ (isset($data['direct_placement']) && $data['direct_placement']==1) ? 'checked' : '' }}>
                                                    <label for="yeson" class="text-light">Yes</label>
                                                </div>
                                                <div>
                                                    <input type="radio" class="custom-radio" name="direct_placement" value="0"
                                                        {{ (isset($data['direct_placement']) && $data['direct_placement']==0) ? 'checked' : '' }}>
                                                    <label for="yesno" class="text-light">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="form-label">Attendance in previous school: Attendance percentage</label>
                                                <input type="text" name="percentage" class="form-control" placeholder="Percentage" value="{{ $data['percentage'] ?? '' }}">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-check col-lg-6 mt-4 mb-4">
                                        <label>Consent <span class="text-danger">*</span></label><br>
                                        <label class="custom-checks" for="chek">
                                            I have read and understood your admission process and agree with the Terms
                                            and Conditions of Al-Rushd Independent School.
                                            <input id="chek" type="checkbox" required name="accpet" value="1" {{ (isset($data['accpet']) && $data['accpet']==1) ? 'checked' : '' }}>
                                            <span class="custom-checkmarks"></span>
                                        </label>

                                        <div class="mt-3">
                                            Please check that all information is correct before submitting it.
                                        </div>
                                    </div>


                                </div>
                                <!-- End Rrow -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-lg-11 m-auto">

                    <button type="submit" class="btn custom-btn w-100">Continue</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('form.step', 3) }}" class="text-light text-decoration-none"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



@endsection


@section('script')
<script>

</script>


@endsection