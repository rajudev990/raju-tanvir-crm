@extends('admin.layouts.app')

@section('title') Add Language @endsection

@section('content')


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Add languages</h5>

        @can('view languages')
        <a href="{{ route('admin.languages.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.languages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-12">
                <label class="form-label">Name</label>
                <div class="has-validation">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
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
                @can('view languages')
                <a href="{{ route('admin.languages.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Save</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection