@extends('admin.layouts.app')

@section('title') Form Submission View @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">Form Submission View</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <h6 class="card-title" style="color: #fdbb0e;">Primary Parents Information</h6>
                    <br>
                    <p class="mb-0"><b>Name : </b>{{ $data->title }} {{ $data->fname }} {{ $data->lname }}</p>
                    <p class="mb-0"><b>Relationship : </b>{{ $data->relationship }}</p>
                    <p class="mb-0"><b>Email : </b>{{ $data->email }}</p>
                    <p class="mb-0"><b>Confirm : </b>{{ $data->confirm_email }}</p>
                    <p class="mb-0"><b>Phone : </b>{{ $data->mobile_number }}</p>
                    <p class="mb-0"><b>Home TelePhone : </b>{{ $data->home_telephone }}</p>
                    <p class="mb-0"><b>Work Number : </b>{{ $data->work_number }}</p>
                    <p class="mb-0"><b>Country : </b>{{ $data->country }}, City : {{ $data->city }}, Post : {{ $data->postal_code }}</p>
                    <p class="mb-0"><b>Address : </b>{{ $data->address }}</p>
                    <p class="mb-0"><b>Apartment : </b>{{ $data->apartment }}</p>
                    <p class="mb-0"><b>Province : </b>{{ $data->province }}</p>
                    <p class="mb-0"><b>School Name : </b>{{ $data->selected_school }}</p>
                    <p class="mb-0"><b>Total Child : </b>{{ $data->students()->count() }}</p>
                </div>

                <div class="col-lg-6 mb-3">
                    <h6 class="card-title" style="color: #fdbb0e;">Secondary Parents Information</h6>
                    <br>
                    <p class="mb-0"><b>Name : </b>{{ $data->secondary_title }} {{ $data->secondary_fname }} {{ $data->secondary_lname }}</p>
                    <p class="mb-0"><b>Relationship : </b>{{ $data->secondary_relationship }}</p>
                    <p class="mb-0"><b>Email : </b>{{ $data->secondary_email }}</p>
                    <p class="mb-0"><b>Confirm : </b>{{ $data->secondary_confirm_email }}</p>
                    <p class="mb-0"><b>Phone : </b>{{ $data->secondary_mobile_number }}</p>
                    <p class="mb-0"><b>Home TelePhone : </b>{{ $data->secondary_home_telephone }}</p>
                    <p class="mb-0"><b>Work Number : </b>{{ $data->secondary_work_number }}</p>
                    <p class="mb-0"><b>Country : </b>{{ $data->secondary_country }}, City : {{ $data->secondary_city }}, Post : {{ $data->secondary_postal_code }}</p>
                    <p class="mb-0"><b>Address : </b>{{ $data->secondary_address }}</p>
                    <p class="mb-0"><b>Apartment : </b>{{ $data->secondary_apartment }}</p>
                    <p class="mb-0"><b>Province : </b>{{ $data->secondary_province }}</p>
                </div>


                <h6 class="card-title" style="color: #fdbb0e;">Student Information</h6>
                <br>
                <br>

                <div class="row">
                    @foreach($data->students as $student)
                    <div class="col-lg-6 mb-4 card">
                        <p class="mb-0"><b>Serial : </b>{{ $loop->iteration }}</p>
                        <p class="mb-0"><b>Name : </b>{{ $student->fname }} {{ $student->lname }}</p>
                        <p class="mb-0"><b>DOB : </b>{{ $student->dob }}</p>
                        <p class="mb-0"><b>Gender : </b>{{ $student->gender }}</p>
                        <p class="mb-0"><b>Nationality : </b>{{ $student->nationality }}</p>
                        <p class="mb-0"><b>Start Date : </b>{{ $student->start_date }}</p>
                        <p class="mb-0"><b>Group : </b>{{ $student->group->name }}</p>
                        <p class="mb-0"><b>Year : </b>{{ $student->course->year->name }}</p>
                        <p class="mb-0"><b>Package : </b>{{ $student->course->package->name }}</p>
                        @if($student->hifdh==1)
                        <p class="mb-0"><b>Hifdh : </b>Yes</p>
                        <p class="mb-0"><b>Hifdh : </b>{{ $student->course->hifdh_text }}</p>
                        @else
                        <p class="mb-0"><b>Hifdh : </b>N/A</p>
                        @endif

                        @if(!empty($student->core_subject))
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <label style="font-size:18px;font-weight:500;color:#AE9A66;">Core Subjects</label>
                                <div>
                                    @foreach(explode(',', $student->core_subject) as $subject)
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

                        @if(!empty($student->islamic_subject))
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <label style="font-size:18px;font-weight:500;color:#AE9A66;">Free Islamic Subject</label>
                                <div>
                                    @foreach(explode(',', $student->islamic_subject) as $subject)
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

                        @if(!empty($student->additional_subject))
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <label style="font-size:18px;font-weight:500;color:#AE9A66;">Additional Subjects</label>
                                <div>
                                    @foreach(explode(',', $student->additional_subject) as $subject)
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

                        @if(!empty($student->hifdh_subject))
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <label style="font-size:18px;font-weight:500;color:#AE9A66;">Additional Hifdh/Hifz Curriculum</label>
                                <div>
                                    @foreach(explode(',', $student->hifdh_subject) as $subject)
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


                        @if(!empty($student->language))
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <label style="font-size:18px;font-weight:500;color:#AE9A66;">Language</label>
                                <div>
                                    @foreach(explode(',', $student->language) as $subject)
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
                    @endforeach
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    @if(!empty($data->packages))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Package</th>
                                <th>Regular Price</th>
                                <th>Discount Price</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->packages as $pkg)
                            <tr>
                                <td>{{ $students[$pkg['student_id']] ?? 'Unknown' }}</td>
                                <td>{{ ucfirst($pkg['package']) }}</td>
                                <td>£{{ $pkg['regular_price'] }}</td>
                                <td>£{{ $pkg['discount_price'] }}</td>
                                <td>£{{ $pkg['discount'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No packages found.</p>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">


                        <div class="col-md-7">
                            <label class="form-label d-block">
                                An Education & Health Care plan (EHCP) is a formal document
                                detailing a child's learning difficulties and the help they will be
                                given. Does the child have an Education Health Care Plan?

                            </label>
                            <span class="badge bg-primary">{{$data->health_care==1 ? 'Yes' : 'No' }}</span>

                        </div>

                        <div class="col-md-5">
                            <label class="form-label d-block w-492px h-63">
                                Permanent Exclusions : Has this child been permanently excluded (expelled)
                                from their previous school?

                            </label>
                            <span class="badge bg-primary">{{$data->previus_school==1 ? 'Yes' : 'No' }}</span>

                        </div>

                        <p class="col-md-8 text-light mb-0 mt-3">
                            <label class="form-label">
                                Fair Access Protocol: (Checkboxes option for the list below) -
                                Does the child fall under any of the below listed categories of the Fair Access Protocol?

                            </label>
                            @if($data->access_protocol==0)
                            <span class="badge bg-primary">Children subject to a child in need plan or a child protection plan within the last 12 months</span>
                            @elseif($data->access_protocol==1)
                            <span class="badge bg-primary">Children living in a refuge</span>
                            @elseif($data->access_protocol==2)
                            <span class="badge bg-primary">Children from the criminal justice system</span>
                            @elseif($data->access_protocol==3)
                            <span class="badge bg-primary">Children who are carers</span>
                            @elseif($data->access_protocol==4)
                            <span class="badge bg-primary">Children who are homeless</span>
                            @elseif($data->access_protocol==5)
                            <span class="badge bg-primary">Children in formal kinship care arrangements</span>
                            @elseif($data->access_protocol==6)
                            <span class="badge bg-primary">Children of, or who are, Gypsies, Roma or Travellers</span>
                            @elseif($data->access_protocol==7)
                            <span class="badge bg-primary">Children who are refugees or asylum seekers</span>
                            @elseif($data->access_protocol==8)
                            <span class="badge bg-primary">Children who have been out of education for four weeks or more</span>
                            @elseif($data->access_protocol==9)
                            <span class="badge bg-primary">None</span>
                            @elseif($data->access_protocol==10)
                            <span class="badge bg-primary">Other</span>
                            @endif

                        </p>


                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="form-label">If any of these apply, provide the supporting local authority</label>
                                    <span class="badge bg-primary">{{$data->authority }}</span>
                                </div>
                            </div>




                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="form-label">Provide the name of the assigned social worker*</label>
                                    <span class="badge bg-primary">{{$data->assigned }}</span>

                                </div>
                            </div>
                        </div>



                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="form-label d-block w-492px h-63">
                                    Special Educational Needs and Disabilities: Is this child on the special educational needs and disabilities code of practice

                                </label>
                                <span class="badge bg-primary">{{$data->special_education==1 ? 'Yes' : 'No' }}</span>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label d-block w-492px h-63">
                                    Medical Conditions: Does the child have any long term medical conditions? 

                                </label>
                                <span class="badge bg-primary">{{$data->medical_condition==1 ? 'Yes' : 'No' }}</span>

                            </div>
                        </div>




                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="form-label d-block w-492px h-63">
                                    Direct Placements: Has the child been directed to an Alternative Provision to improve their behaviour?

                                </label>
                                <span class="badge bg-primary">{{$data->direct_placement==1 ? 'Yes' : 'No' }}</span>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="form-label">Attendance in previous school: Attendance percentage</label>
                                    <span class="badge bg-primary">{{$data->percentage }}</span>


                                </div>
                            </div>
                        </div>


                        <div class="form-check col-lg-6 mt-4 mb-4">
                            <label>Consent <span class="text-danger">*</span></label><br>
                            <label class="custom-checks" for="chek">
                                I have read and understood your admission process and agree with the Terms
                                and Conditions of Al-Rushd Independent School.

                                <span class="badge bg-primary">{{$data->accpet==1 ? 'Yes' : 'No' }}</span>


                            </label>


                        </div>


                    </div>
                </div>
            </div>

            <!--  -->
            <div class="row">
                <!-- Step 6: Signature Info -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-primary text-white">
                            <strong>Signature Info</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Signature:</strong> {{ $data->signature ?? 'N/A' }}</p>
                            <p><strong>Signature Accept:</strong> {{ $data->signature_accept ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Step 7: Payment Info -->
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-success text-white">
                            <strong>Payment Info</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $data->payment_email ?? 'N/A' }}</p>
                            <p><strong>Country:</strong> {{ $data->payment_country ?? 'N/A' }}</p>
                            <p><strong>Postal Code:</strong> {{ $data->payment_postal_code ?? 'N/A' }}</p>
                            <p><strong>Accepted:</strong> {{ $data->payment_accept ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <!-- Transaction Details -->
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white">
                            <strong>Transaction Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Status:</strong>
                                        <span class="badge bg-{{ $data->status == 'paid' ? 'success' : 'warning' }}">
                                            {{ ucfirst($data->status) }}
                                        </span>
                                    </p>
                                    <p><strong>Total Amount:</strong> £{{ number_format($data->total_amount, 2) }}</p>
                                    <p><strong>Paid Amount:</strong> £{{ number_format($data->paid_amount, 2) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Transaction ID:</strong> {{ $data->transaction_id ?? 'N/A' }}</p>
                                    <p><strong>Card Holder:</strong> {{ $data->card_holder_name ?? 'N/A' }}</p>
                                    <p><strong>Currency:</strong> {{ $data->currency ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Payment Date:</strong>
                                        {{ $data->payment_date ? $data->payment_date : 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>


    </div>
</div>
</div>
@endsection