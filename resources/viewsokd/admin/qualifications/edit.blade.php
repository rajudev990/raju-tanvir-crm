@extends('admin.layouts.app')

@section('title') Update Qualification @endsection

@section('css')
<style>
    label {
        font-size: 14px;
    }
</style>
@endsection

@section('content')

<div class="row gy-4 pt-5">

    @if ($errors->any())
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Update Qualification</h5>

                @can('view qualifications')
                <a href="{{ route('admin.qualifications.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.qualifications.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="col-md-6">
                        <label class="form-label">Group</label>
                        <div class="has-validation">
                            <select name="group_year_id" id="group_year_id" class="form-control form-select @error('group_year_id') is-invalid @enderror">
                                @foreach($group_years as $item)
                                <option value="{{ $item->id }}" {{ $data->group_year_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('group_year_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Qualification Package</label>
                        <div class="has-validation">
                            <select name="qualification_package_id" id="qualification_package_id" class="form-control form-select @error('qualification_package_id') is-invalid @enderror">
                                <option value="1" {{ $data->qualification_package_id == 1 ? 'selected' : ''  }}>Core Package</option>
                                <option value="2" {{ $data->qualification_package_id == 2 ? 'selected' : ''  }}>3 Subjects Package</option>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="has-validation">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" required>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <div class="has-validation">
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $data->title }}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                            <label class="form-label">Subject Selector</label>
                            <div class="has-validation">
                                <input type="text" name="subject_selector" id="subject_selector" class="form-control @error('subject_selector') is-invalid @enderror" value="{{ $data->subject_selector }}">
                                @error('subject_selector')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <div class="has-validation">
                            <textarea id="description" name="description" class="summernote form-control @error('description') is-invalid @enderror">{!! $data->description !!}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Total Subjects</label>
                        <div class="has-validation">
                            <input type="number" name="total_subjects" id="total_subjects" class="form-control @error('total_subjects') is-invalid @enderror" value="{{ $data->total_subjects }}">
                            @error('total_subjects')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Locked (Core Subjects)</label>
                        <div class="has-validation">
                            <select name="locked" id="locked" class="form-control form-select @error('locked') is-invalid @enderror">
                                <option value="1" {{ $data->locked ==1 ? 'selected' : ''  }}>Yes</option>
                                <option value="0" {{ $data->locked ==0 ? 'selected' : ''  }}>No</option>
                            </select>
                            @error('locked')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $data->status ==1 ? 'selected' : ''  }}>Active</option>
                                <option value="0" {{ $data->status ==0 ? 'selected' : ''  }}>Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Hifdh Programme (optional)</label>
                        <div class="has-validation">
                            <input type="text" name="hifdh_programme" id="hifdh_programme" class="form-control @error('hifdh_programme') is-invalid @enderror" placeholder="Hifdh Programme" value="{{ $data->hifdh_programme }}">
                            @error('hifdh_programme')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Hifdh Status (optional)</label>
                        <div class="has-validation">
                            <select name="hifdh_status" id="hifdh_status" class="form-control form-select @error('hifdh_status') is-invalid @enderror">
                                <option value="">Select Status</option>
                                <option value="1" {{ $data->hifdh_status==1 ? 'selected' : ''  }}>Yes</option>
                                <option value="0" {{ $data->hifdh_status==0 ? 'selected' : ''  }}>No</option>
                            </select>
                            @error('hifdh_status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-12 mt-32">
                        <hr>
                        <p class="fw-bold mt-12">Core Subjects</p>
                    </div>

                    {{-- Core Subjects --}}
                    @foreach($subjects as $item)
                    <div class="col-lg-3">
                        <input class="form-check-input"
                            type="checkbox"
                            value="{{ $item->id }}"
                            id="core_subject-{{ $item->id }}"
                            name="core_subjects[]"
                            {{ in_array($item->id, $coreSubjectIds) ? 'checked' : '' }}>
                        <label for="core_subject-{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach


                    <div class="col-12 mt-20">
                        <hr>
                        <p class="fw-bold mt-12">Free Additional Subjects</p>
                    </div>

                    {{-- Additional Subjects --}}
                    @foreach($subjects as $item)
                    <div class="col-lg-3">
                        <input class="form-check-input"
                            type="checkbox"
                            value="{{ $item->id }}"
                            id="additional_subject-{{ $item->id }}"
                            name="additional_subjects[]"
                            {{ in_array($item->id, $additionalSubjectIds) ? 'checked' : '' }}>
                        <label for="additional_subject-{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach



                    <div class="col-12 mt-20">
                        <hr>
                        <p class="fw-bold mt-12">Free Islamic & Quranic Subject</p>
                    </div>

                    {{-- Additional Subjects --}}
                    @foreach($subjects as $item)
                    <div class="col-lg-3">
                        <input class="form-check-input"
                            type="checkbox"
                            value="{{ $item->id }}"
                            id="additional_islamic_subject-{{ $item->id }}"
                            name="additional_islamic_subjects[]"
                            {{ in_array($item->id, $additionalIslamicIds) ? 'checked' : '' }}>
                        <label for="additional_islamic_subject-{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach


                    <div class="col-12 mt-20">
                        <hr>
                        <p class="fw-bold mt-12">Additional Languages</p>
                    </div>

                    {{-- Additional Languages --}}
                    @foreach($languages as $item)
                    <div class="col-lg-3">
                        <input class="form-check-input"
                            type="checkbox"
                            value="{{ $item->id }}"
                            id="additional_language-{{ $item->id }}"
                            name="additional_languages[]"
                            {{ in_array($item->id, $additionalLanguageIds) ? 'checked' : '' }}>
                        <label for="additional_language-{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach





                    <div class="col-md-12 text-end">

                        @can('view qualifications')
                        <a href="{{ route('admin.qualifications.index') }}" class="btn btn-primary btn-sm">← Back</a>
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
@endsection