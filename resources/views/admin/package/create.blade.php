@extends('admin.layouts.app')

@section('title') Add Package @endsection

@section('content')


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Add Package</h5>

        @can('view package')
        <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-12">
                <label class="form-label">Groups</label>
                <div class="has-validation">
                    <select name="group_id" id="group_id" class="form-control form-select @error('group_id') is-invalid @enderror">
                        @foreach($groups as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach

                    </select>
                    @error('group_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">Title</label>
                <div class="has-validation">
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">Description</label>
                <div class="has-validation">
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Status</label>
                <div class="has-validation">
                    <select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12 text-end">
                @can('view package')
                <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Save</button>
            </div>
        </form>
    </div>
</div>

@endsection