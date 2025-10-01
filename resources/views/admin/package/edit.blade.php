@extends('admin.layouts.app')

@section('title') Update Package @endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Update Package</h5>

        @can('view package')
        <a href="{{ route('admin.package.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.package.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-12">
                <label class="form-label">Groups</label>
                <div class="has-validation">
                    <select name="group_id" id="group_id" class="form-control form-select @error('group_id') is-invalid @enderror">
                        @foreach($groups as $item)
                        <option value="{{ $item->id }}" {{ $data->group_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
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
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $data->title }}" required>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">Description</label>
                <div class="has-validation">
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{!! $data->description !!}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Status</label>
                <div class="has-validation">
                    <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                        <option value="1" {{ $data->status==1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $data->status==0 ? 'selected' : '' }}>Deactive</option>
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
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Update</button>
            </div>
        </form>
    </div>
</div>


@endsection