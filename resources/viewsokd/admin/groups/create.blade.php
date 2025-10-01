@extends('admin.layouts.app')

@section('title') Add Groups @endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Add Groups</h5>

        @can('view group')
        <a href="{{ route('admin.groups.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.groups.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-6">
                <label class="form-label">Serial No.</label>
                <div class="has-validation">
                    <input type="number" name="serial" id="serial" class="form-control @error('serial') is-invalid @enderror" placeholder="1" required>
                    @error('serial')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Class Name</label>
                <div class="has-validation">
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Primary" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Key Stage</label>
                <div class="has-validation">
                    <input type="text" name="list1" id="list1" class="form-control @error('list1') is-invalid @enderror" placeholder="Key stage 1–2" value="{{ old('list1') }}">
                    @error('list1')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Years</label>
                <div class="has-validation">
                    <input type="text" name="list2" id="list2" class="form-control @error('list2') is-invalid @enderror" placeholder="Years 1–6" value="{{ old('list2') }}">
                    @error('list2')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Age</label>
                <div class="has-validation">
                    <input type="text" name="list3" id="list3" class="form-control @error('list3') is-invalid @enderror" placeholder="Ages 6–11" value="{{ old('list3') }}">
                    @error('list3')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Extra Class Item 01</label>
                <div class="has-validation">
                    <input type="text" name="list4" id="list4" class="form-control @error('list4') is-invalid @enderror" value="{{ old('list4') }}">
                    @error('list4')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Extra Class Item 02</label>
                <div class="has-validation">
                    <input type="text" name="list5" id="list5" class="form-control @error('list5') is-invalid @enderror" value="{{ old('list5') }}">
                    @error('list5')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <!-- <div class="col-md-12">
                        <label class="form-label">List</label>
                        <div class="has-validation">
                            <textarea id="list" name="list" class="summernote form-control @error('list') is-invalid @enderror" required></textarea>
                            @error('list')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div> -->

            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="has-validation">
                    <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12 text-end">
        @can('view group')
        <a href="{{ route('admin.groups.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Save</button>
            </div>
        </form>
    </div>
</div>
@endsection