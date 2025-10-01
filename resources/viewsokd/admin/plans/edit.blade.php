@extends('admin.layouts.app')

@section('title') Update Plan @endsection

@section('content')


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Update plans</h5>

        @can('view plan')
        <a href="{{ route('admin.plans.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.plans.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="col-md-12">
                <label class="form-label">Groups</label>
                <div class="has-validation">
                    <select name="group_id" id="group_id" class="form-control form-select @error('group_id') is-invalid @enderror">
                        <option value="">Select Group</option>
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
                <label class="form-label">Start Date</label>
                <div class="has-validation">
                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $data->start_date }}" required>
                    @error('start_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">End Date</label>
                <div class="has-validation">
                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $data->end_date }}" required>
                    @error('end_date')
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
                <a href="{{ route('admin.plans.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Update</button>
            </div>
        </form>
    </div>

</div>
@endsection