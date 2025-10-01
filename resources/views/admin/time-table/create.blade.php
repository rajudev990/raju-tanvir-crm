@extends('admin.layouts.app')

@section('title') Add Time Table @endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Add Time Table</h5>

        @can('view group')
        <a href="{{ route('admin.time-tables.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.time-tables.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-6">
                <label class="form-label">Name</label>
                <div class="has-validation">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="UK Timetable" required>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Lessions</label>
                <div class="has-validation">
                    <input type="text" name="lession" id="lession" class="form-control @error('lession') is-invalid @enderror" placeholder="Lessons Monday - Friday">
                    @error('lession')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Starting</label>
                <div class="has-validation">
                    <input type="text" name="starting" id="starting" class="form-control @error('starting') is-invalid @enderror" placeholder="Starting 08:00am GMT">
                    @error('starting')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>




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
                <a href="{{ route('admin.time-tables.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Save</button>
            </div>
        </form>
    </div>
</div>
@endsection