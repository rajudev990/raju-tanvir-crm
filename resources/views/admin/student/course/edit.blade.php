@extends('admin.layouts.app')

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-xl">Student Course</h6>
                <p class="text-neutral-500">Fill up your details and proceed next steps.</p>

                <!-- Form Wizard Start -->
                <div class="form-wizard">
                    <form action="{{ route('admin.student-course.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-wizard-header overflow-x-auto scroll-sm pb-8 my-32">
                            <ul class="list-unstyled form-wizard-list">
                                <li class="form-wizard-list__item active">
                                    <div class="form-wizard-list__line">
                                        <span class="count">1</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Create Course </span>
                                </li>

                                <li class="form-wizard-list__item active">
                                    <div class="form-wizard-list__line">
                                        <span class="count">2</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Language </span>
                                </li>
                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">3</span>
                                    </div>
                                    <span class="text text-xs fw-semibold"> Core Subject</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">4</span>
                                    </div>
                                    <span class="text text-xs fw-semibold"> Islamic Subject</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">5</span>
                                    </div>
                                    <span class="text text-xs fw-semibold"> Additional Subject</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">6</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Hifdh</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">7</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Plan</span>
                                </li>
                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">8</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Monthly</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">9</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Annual</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">10</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Termly</span>
                                </li>

                                <li class="form-wizard-list__item">
                                    <div class="form-wizard-list__line">
                                        <span class="count">11</span>
                                    </div>
                                    <span class="text text-xs fw-semibold">Completed</span>
                                </li>
                            </ul>
                        </div>

                        <fieldset class="wizard-fieldset show">
                            <h6 class="text-md text-neutral-500">Course Information</h6>
                            <div class="row gy-3">
                                <div class="col-sm-6">
                                    <label class="form-label">Group <span class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <select name="group_id" id="group_id" class="form-select @error('group_id') is-invalid @enderror" required>
                                            <option value="">-- Select Group --</option>
                                            @foreach($group as $item)
                                            <option value="{{$item->id}}" {{ $data->group_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Year<span class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <select name="year_id" id="year_id" class="form-select @error('year_id') is-invalid @enderror" required>
                                        <option value="">-- Select Year --</option>
                                        @if($data->group_id)
                                            @php
                                                $years = \App\Models\StudentYear::where('group_id', $data->group_id)->where('status',1)->get();
                                            @endphp
                                            @foreach($years as $year)
                                                <option value="{{ $year->id }}" {{ $data->year_id == $year->id ? 'selected' : '' }}>
                                                    {{ $year->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Package<span class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <select name="package_id" id="package_id" class="form-select @error('package_id') is-invalid @enderror" required>
                                            @foreach($package as $item)
                                            <option value="{{$item->id}}" {{ $data->package_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="form-group text-end">
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500"> Language</h6>
                            <div class="row gy-3">



                                <div class="col-12 mt-32">
                                    <hr>
                                    <p class="fw-bold mt-12">Language</p>
                                </div>


                                @foreach($language as $item)
                                <div class="col-lg-3">
                                    <input  class="form-check-input" type="checkbox" value="{{ $item->id }}" id="language-{{$item->id}}" name="language[]" {{ in_array($item->id, $selectedLanguages) ? 'checked' : '' }}>
                                    <label for="language-{{$item->id}}">{{ $item->name }}</label>
                                </div>
                                @endforeach


                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500"> Core Subject</h6>
                            <div class="row gy-3">



                                <div class="col-12 mt-32">
                                    <hr>
                                    <p class="fw-bold mt-12">Core Subjects</p>
                                </div>


                                @foreach($subject as $item)
                                <div class="col-lg-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="core_subject-{{$item->id}}" name="core_subject[]" {{ in_array($item->id, $selectedCoreSubjects) ? 'checked' : '' }}>
                                    <label for="core_subject-{{$item->id}}">{{ $item->name }}</label>
                                </div>
                                @endforeach


                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500"> Islamic Subject</h6>
                            <div class="row gy-3">



                                <div class="col-12 mt-32">
                                    <hr>
                                    <p class="fw-bold mt-12">Islamic Subjects</p>
                                </div>


                                @foreach($subject as $item)
                                <div class="col-lg-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="islamic_subject-{{$item->id}}" name="islamic_subject[]" {{ in_array($item->id, $selectedIslamicSubjects) ? 'checked' : '' }}>
                                    <label for="islamic_subject-{{$item->id}}">{{ $item->name }}</label>
                                </div>
                                @endforeach


                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500"> Additional Subject</h6>
                            <div class="row gy-3">


                                <div class="col-12 mt-32">
                                    <hr>
                                    <p class="fw-bold mt-12">Additional Subjects</p>
                                </div>


                                @foreach($subject as $item)
                                <div class="col-lg-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="additional_subject-{{$item->id}}" name="additional_subject[]" {{ in_array($item->id, $selectedAdditionalSubjects) ? 'checked' : '' }}>
                                    <label for="additional_subject-{{$item->id}}">{{ $item->name }}</label>
                                </div>
                                @endforeach

                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500">Hifdh</h6>
                            <div class="row gy-3">
                                <div class="col-sm-6">
                                    <label class="form-label">Additional Subject<span class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <select name="hifdh" id="hifdh" class="form-select @error('hifdh') is-invalid @enderror" required>
                                            <option value="1" {{ $data->hifdh == 1 ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ $data->hifdh == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Hifdh Text</label>
                                    <div class="position-relative">
                                        <input type="text" value="{{$data->hifdh_text }}" name="hifdh_text" id="hifdh_text" class="form-control  @error('hifdh') is-invalid @enderror">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500">Plan</h6>
                            <div class="row gy-3">

                                <div class="col-sm-6">
                                    <label class="form-label">Plan One</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_one }}" type="text" name="plan_text_one" id="plan_text_one" class="form-control  @error('plan_text_one') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Plan Two</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_two }}" type="text" name="plan_text_two" id="plan_text_two" class="form-control  @error('plan_text_two') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Plan Three</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_three }}" type="text" name="plan_text_three" id="plan_text_three" class="form-control  @error('plan_text_three') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label class="form-label">Plan Four</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_four }}" type="text" name="plan_text_four" id="plan_text_four" class="form-control  @error('plan_text_four') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Plan Five</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_five }}" type="text" name="plan_text_five" id="plan_text_five" class="form-control  @error('plan_text_five') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Plan Six</label>
                                    <div class="position-relative">
                                        <input value="{{$data->plan_text_six }}" type="text" name="plan_text_six" id="plan_text_six" class="form-control  @error('plan_text_six') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500">Monthly Price</h6>
                            <div class="row gy-3">

                                <div class="col-sm-6">
                                    <label class="form-label">Regular Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_regular_price }}" type="text" name="m_regular_price" id="m_regular_price" class="form-control  @error('m_regular_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Discount Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_discount_price }}" type="text" name="m_discount_price" id="m_discount_price" class="form-control  @error('m_discount_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label class="form-label">Discount</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_discount }}" type="text" name="m_discount" id="m_discount" class="form-control  @error('m_discount') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List One</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_one }}" type="text" name="m_list_one" id="m_list_one" class="form-control  @error('m_list_one') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Two</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_two }}" type="text" name="m_list_two" id="m_list_two" class="form-control  @error('m_list_two') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Three</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_three }}" type="text" name="m_list_three" id="m_list_three" class="form-control  @error('m_list_three') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Four</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_four }}" type="text" name="m_list_four" id="m_list_four" class="form-control  @error('m_list_four') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Five</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_five }}" type="text" name="m_list_five" id="m_list_five" class="form-control  @error('m_list_five') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Six</label>
                                    <div class="position-relative">
                                        <input value="{{$data->m_list_six }}" type="text" name="m_list_six" id="m_list_six" class="form-control  @error('m_list_six') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500">Annual Price</h6>
                            <div class="row gy-3">

                                <div class="col-sm-6">
                                    <label class="form-label">Regular Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_regular_price }}" type="text" name="a_regular_price" id="a_regular_price" class="form-control  @error('a_regular_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Discount Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_discount_price }}" type="text" name="a_discount_price" id="a_discount_price" class="form-control  @error('a_discount_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label class="form-label">Discount</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_discount }}" type="text" name="a_discount" id="a_discount" class="form-control  @error('a_discount') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List One</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_one }}" type="text" name="a_list_one" id="a_list_one" class="form-control  @error('a_list_one') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Two</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_two }}" type="text" name="a_list_two" id="a_list_two" class="form-control  @error('a_list_two') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Three</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_three }}" type="text" name="a_list_three" id="a_list_three" class="form-control  @error('a_list_three') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Four</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_four }}" type="text" name="a_list_four" id="a_list_four" class="form-control  @error('a_list_four') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Five</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_five }}" type="text" name="a_list_five" id="a_list_five" class="form-control  @error('a_list_five') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Six</label>
                                    <div class="position-relative">
                                        <input value="{{$data->a_list_six }}" type="text" name="a_list_six" id="a_list_six" class="form-control  @error('a_list_six') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>


                        <fieldset class="wizard-fieldset">
                            <h6 class="text-md text-neutral-500">Termly Price</h6>
                            <div class="row gy-3">

                                <div class="col-sm-6">
                                    <label class="form-label">Regular Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_regular_price }}" type="text" name="t_regular_price" id="t_regular_price" class="form-control  @error('t_regular_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Discount Price</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_discount_price }}" type="text" name="t_discount_price" id="t_discount_price" class="form-control  @error('t_discount_price') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label class="form-label">Discount</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_discount }}" type="text" name="t_discount" id="t_discount" class="form-control  @error('t_discount') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List One</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_one }}" type="text" name="t_list_one" id="t_list_one" class="form-control  @error('t_list_one') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Two</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_two }}" type="text" name="t_list_two" id="t_list_two" class="form-control  @error('t_list_two') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Three</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_three }}" type="text" name="t_list_three" id="t_list_three" class="form-control  @error('t_list_three') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Four</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_four }}" type="text" name="t_list_four" id="t_list_four" class="form-control  @error('t_list_four') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Five</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_five }}" type="text" name="t_list_five" id="t_list_five" class="form-control  @error('t_list_five') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">List Six</label>
                                    <div class="position-relative">
                                        <input value="{{$data->t_list_six }}" type="text" name="t_list_six" id="t_list_six" class="form-control  @error('t_list_six') is-invalid @enderror ">
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                    <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                    <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <!-- Status Field -->
                            <div class="col-md-6 mb-4">
                                
                                <div class="col-sm-6">
                                    <label class="form-label fw-semibold mb-2">
                                    Status <span class="text-danger">*</span>
                                </label>
                                    <div class="position-relative">
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="1" {{$data->status==1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{$data->status==0 ? 'selected' : '' }}>DeActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="wizard-form-error"></div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="form-group d-flex align-items-center justify-content-end gap-3 mt-4">
                                <button type="button" class="form-wizard-previous-btn btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                <button type="submit" class="form-wizard-submit btn btn-primary-600 px-32">Update</button>
                            </div>
                        </fieldset>


                    </form>
                </div>
                <!-- Form Wizard End -->


            </div>
        </div>
    </div>
</div>
@endsection



@section('script')


{{-- Ajax for dynamic years --}}
<script>
$(document).ready(function() {
    function loadYears(group_id, selectedYear = null) {
        if (group_id) {
            $.ajax({
                url: '/admin/get-years/' + group_id,
                type: 'GET',
                success: function(data) {
                    $('#year_id').empty().append('<option value="">-- Select Year --</option>');
                    $.each(data, function(key, value) {
                        let isSelected = selectedYear && selectedYear == value.id ? 'selected' : '';
                        $('#year_id').append('<option value="' + value.id + '" ' + isSelected + '>' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#year_id').empty().append('<option value="">-- Select Year --</option>');
        }
    }

    // On page load, if group_id exists, load years with selected year
    var initialGroup = $('#group_id').val();
    var selectedYear = "{{ $data->year_id }}";
    if(initialGroup) {
        loadYears(initialGroup, selectedYear);
    }

    // On group change
    $('#group_id').on('change', function() {
        var group_id = $(this).val();
        loadYears(group_id);
    });
});
</script>

<script>
    // =============================== Wizard Step Js Start ================================
    $(document).ready(function() {
        // click on next button
        $('.form-wizard-next-btn').on("click", function() {
            var parentFieldset = $(this).parents('.wizard-fieldset');
            var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
            var next = $(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = $(this).val();

                if (thisValue == "") {
                    $(this).siblings(".wizard-form-error").show();
                    nextWizardStep = false;
                } else {
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
            if (nextWizardStep) {
                next.parents('.wizard-fieldset').removeClass("show", "400");
                currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
                next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                $(document).find('.wizard-fieldset').each(function() {
                    if ($(this).hasClass('show')) {
                        var formAtrr = $(this).attr('data-tab-content');
                        $(document).find('.form-wizard-list .form-wizard-step-item').each(function() {
                            if ($(this).attr('data-attr') == formAtrr) {
                                $(this).addClass('active');
                                var innerWidth = $(this).innerWidth();
                                var position = $(this).position();
                                $(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                $(this).removeClass('active');
                            }
                        });
                    }
                });
            }
        });
        //click on previous button
        $('.form-wizard-previous-btn').on("click", function() {
            var counter = parseInt($(".wizard-counter").text());;
            var prev = $(this);
            var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
            prev.parents('.wizard-fieldset').removeClass("show", "400");
            prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
            currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
            $(document).find('.wizard-fieldset').each(function() {
                if ($(this).hasClass('show')) {
                    var formAtrr = $(this).attr('data-tab-content');
                    $(document).find('.form-wizard-list .form-wizard-step-item').each(function() {
                        if ($(this).attr('data-attr') == formAtrr) {
                            $(this).addClass('active');
                            var innerWidth = $(this).innerWidth();
                            var position = $(this).position();
                            $(document).find('.form-wizard-step-move').css({
                                "left": position.left,
                                "width": innerWidth
                            });
                        } else {
                            $(this).removeClass('active');
                        }
                    });
                }
            });
        });
        //click on form submit button
        $(document).on("click", ".form-wizard .form-wizard-submit", function() {
            var parentFieldset = $(this).parents('.wizard-fieldset');
            var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-list .active');
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = $(this).val();
                if (thisValue == "") {
                    $(this).siblings(".wizard-form-error").show();
                } else {
                    $(this).siblings(".wizard-form-error").hide();
                }
            });
        });
        // focus on input field check empty or not
        $(".form-control").on('focus', function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent().addClass("focus-input");
            } else if (tmpThis != '') {
                $(this).parent().addClass("focus-input");
            }
        }).on('blur', function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent().removeClass("focus-input");
                $(this).siblings(".wizard-form-error").show();
            } else if (tmpThis != '') {
                $(this).parent().addClass("focus-input");
                $(this).siblings(".wizard-form-error").hide();
            }
        });
    });
    // =============================== Wizard Step Js End ================================
</script>
@endsection