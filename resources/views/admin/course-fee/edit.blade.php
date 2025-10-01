@extends('admin.layouts.app')

@section('title') Update Course Fees @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Update Course Fees</h5>

                @can('view coursefee')
                <a href="{{ route('admin.course-fees.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.course-fees.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Group Year -->
                    <div class="col-md-6">
                        <label class="form-label">Group Year</label>
                        <select name="group_year_id" id="group_year_id" class="form-control form-select" required>
                            <option value="">Select Group Year</option>
                            @foreach($group_years as $item)
                            <option value="{{ $item->id }}" {{ $data->group_year_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Qualification -->
                    <div class="col-md-6">
                        <label class="form-label">Qualification</label>
                        <select name="qualification_id" id="qualification_id" class="form-control form-select" required>
                            <option value="">Select Qualification</option>
                            {{-- Options will be loaded via JS --}}
                        </select>
                    </div>




                    <div class="col-md-6">
                        <label class="form-label">Contract</label>
                        <select name="contract" id="contract" class="form-control form-select" required>
                            <option value="1" {{$data->contract==1 ? 'selected' : ''}}>Annually - 1 Payments</option>
                            <option value="2" {{$data->contract==2 ? 'selected' : ''}}>Termly - 3 Payments</option>
                            <option value="3" {{$data->contract==3 ? 'selected' : ''}}>Monthly - 10 Payments</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Contract Year</label>
                        <div class="has-validation">
                            <input type="text" name="contract_year" id="contract_year" class="form-control @error('contract_year') is-invalid @enderror" value="{{$data->contract_year}}">
                            @error('contract_year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List One</label>
                        <div class="has-validation">
                            <input type="text" name="list_one" id="list_one" class="form-control @error('list_one') is-invalid @enderror" value="{{$data->list_one}}">
                            @error('list_one')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">List One Status</label>
                        <div class="has-validation">
                            <select name="list_one_status" id="list_one_status" class="form-control form-select @error('list_one_status') is-invalid @enderror">
                                <option value="1" {{$data->list_one_status==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->list_one_status==0 ? 'selected' : ''}}>Deactive</option>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List Two</label>
                        <div class="has-validation">
                            <input type="text" name="list_two" id="list_two" class="form-control @error('list_two') is-invalid @enderror" value="{{$data->list_two}}">
                            @error('list_two')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">List Two Status</label>
                        <div class="has-validation">
                            <select name="list_two_status" id="list_two_status" class="form-control form-select @error('list_two_status') is-invalid @enderror">
                                <option value="1" {{$data->list_two_status==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->list_two_status==0 ? 'selected' : ''}}>Deactive</option>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List Three</label>
                        <div class="has-validation">
                            <input type="text" name="list_three" id="list_three" class="form-control @error('list_three') is-invalid @enderror" value="{{ $data->list_three }}">
                            @error('list_three')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">List Three Status</label>
                        <div class="has-validation">
                            <select name="list_three_status" id="list_three_status" class="form-control form-select @error('list_three_status') is-invalid @enderror">
                                <option value="1" {{$data->list_three_status==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->list_three_status==0 ? 'selected' : ''}}>Deactive</option>
                            </select>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Additional Subjects Price</label>
                        <div class="has-validation">
                            <input type="text" name="additional_subjects_price" id="additional_subjects_price" class="form-control @error('additional_subjects_price') is-invalid @enderror" value="{{ $data->additional_subjects_price }}">
                            @error('additional_subjects_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Subjects Text</label>
                        <div class="has-validation">
                            <input type="text" name="additional_subjects_text" id="additional_subjects_text" class="form-control @error('additional_subjects_text') is-invalid @enderror" value="{{ $data->additional_subjects_text }}">
                            @error('additional_subjects_text')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-12">
                        <label class="form-label">Course Description</label>
                        <div class="has-validation">
                            <textarea rows="4" name="course_description" id="course_description" class="form-control @error('course_description') is-invalid @enderror">{{ $data->course_description }}</textarea>
                            @error('course_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                     <div class="col-md-12">
                        <label class="form-label">Additional Fees Description</label>
                        <div class="has-validation">
                            <textarea rows="4" name="additional_fees_description" id="additional_fees_description" class="form-control @error('additional_fees_description') is-invalid @enderror">{{ $data->additional_fees_description }}</textarea>
                            @error('additional_fees_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Fees One</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_one" id="additional_fees_text_one" class="form-control @error('additional_fees_text_one') is-invalid @enderror" value="{{ $data->additional_fees_text_one }}">
                            @error('additional_fees_text_one')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Fees One Price</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_one_price" id="additional_fees_text_one_price" class="form-control @error('additional_fees_text_one_price') is-invalid @enderror" value="{{ $data->additional_fees_text_one_price }}">
                            @error('additional_fees_text_one_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Two</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_two" id="additional_fees_text_two" class="form-control @error('additional_fees_text_two') is-invalid @enderror" value="{{ $data->additional_fees_text_two }}">
                            @error('additional_fees_text_two')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Two Price</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_two_price" id="additional_fees_text_two_price" class="form-control @error('additional_fees_text_two_price') is-invalid @enderror" value="{{ $data->additional_fees_text_two_price }}">
                            @error('additional_fees_text_two_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Three</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_three" id="additional_fees_text_three" class="form-control @error('additional_fees_text_three') is-invalid @enderror" value="{{ $data->additional_fees_text_three }}">
                            @error('additional_fees_text_three')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Three Price</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_three_price" id="additional_fees_text_three_price" class="form-control @error('additional_fees_text_three_price') is-invalid @enderror" value="{{ $data->additional_fees_text_three_price }}">
                            @error('additional_fees_text_three_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Four</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_four" id="additional_fees_text_four" class="form-control @error('additional_fees_text_four') is-invalid @enderror" value="{{ $data->additional_fees_text_four }}">
                            @error('additional_fees_text_four')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Additional Fees Four Price</label>
                        <div class="has-validation">
                            <input type="text" name="additional_fees_text_four_price" id="additional_fees_text_four_price" class="form-control @error('additional_fees_text_four_price') is-invalid @enderror" value="{{ $data->additional_fees_text_four_price }}">
                            @error('additional_fees_text_four_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Saving (%)</label>
                        <div class="has-validation">
                            <input type="text" name="saving" id="saving" class="form-control @error('saving') is-invalid @enderror" value="{{ $data->saving }}">
                            @error('saving')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Admission Fees</label>
                        <div class="has-validation">
                            <input type="text" name="admission_fee" id="admission_fee" class="form-control @error('admission_fee') is-invalid @enderror" value="{{ $data->admission_fee }}">
                            @error('admission_fee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Deposit Fees</label>
                        <div class="has-validation">
                            <input type="text" name="deposit_fee" id="deposit_fee" class="form-control @error('deposit_fee') is-invalid @enderror" value="{{ $data->deposit_fee }}">
                            @error('deposit_fee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Application Process Fees</label>
                        <div class="has-validation">
                            <input type="text" name="application_process_fee" id="application_process_fee" class="form-control @error('application_process_fee') is-invalid @enderror" value="{{ $data->application_process_fee }}">
                            @error('application_process_fee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Course Fees</label>
                        <div class="has-validation">
                            <input type="text" name="course_fee" id="course_fee" class="form-control @error('course_fee') is-invalid @enderror" value="{{ $data->course_fee }}">
                            @error('course_fee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Course Fees Text</label>
                        <div class="has-validation">
                            <input type="text" name="course_fee_text" id="course_fee_text" class="form-control @error('course_fee_text') is-invalid @enderror" value="{{ $data->course_fee_text }}" placeholder="year (excludes VAT)">
                            @error('course_fee_text')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Per Subject Price for(A Level & International)</label>
                        <div class="has-validation">
                            <input type="text" name="persubject_price" id="persubject_price" class="form-control @error('persubject_price') is-invalid @enderror" value="{{ $data->persubject_price }}">
                            @error('persubject_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Hifdh Programme price</label>
                        <div class="has-validation">
                            <input type="text" name="hifdh_programme_price" id="hifdh_programme_price" class="form-control @error('hifdh_programme_price') is-invalid @enderror" value="{{ $data->hifdh_programme_price }}">
                            @error('hifdh_programme_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                                <option value="1" {{$data->status==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->status==0 ? 'selected' : ''}}>Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-12 text-end">
                        @can('view coursefee')
                        <a href="{{ route('admin.course-fees.index') }}" class="btn btn-primary btn-sm">← Back</a>
                        @endcan
                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:edit"></iconify-icon>
                            </span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    function loadQualifications(groupYearId, selectedQualificationId = null) {
        const qualificationSelect = $('#qualification_id');
        qualificationSelect.empty().append('<option value="">Loading...</option>');

        if (groupYearId) {
            $.ajax({
                url: '/admin/group-year/' + groupYearId + '/qualifications',
                type: 'GET',
                success: function(data) {
                    qualificationSelect.empty().append('<option value="">Select Qualification</option>');
                    $.each(data, function(index, item) {
                        const selected = (selectedQualificationId && selectedQualificationId == item.id) ? 'selected' : '';
                        qualificationSelect.append('<option value="' + item.id + '" ' + selected + '>' + item.name + '</option>');
                    });
                },
                error: function() {
                    qualificationSelect.empty().append('<option value="">Error loading data</option>');
                }
            });
        } else {
            qualificationSelect.empty().append('<option value="">Select Qualification</option>');
        }
    }

    $(document).ready(function() {
        const preSelectedGroupYearId = '{{ $data->group_year_id }}';
        const preSelectedQualificationId = '{{ $data->qualification_id }}';

        // Load qualifications when page loads for edit
        if (preSelectedGroupYearId) {
            loadQualifications(preSelectedGroupYearId, preSelectedQualificationId);
        }

        // Load qualifications when group_year_id changes
        $('#group_year_id').on('change', function() {
            const selectedGroupYearId = $(this).val();
            loadQualifications(selectedGroupYearId);
        });
    });
</script>
@endsection

@endsection