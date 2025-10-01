@extends('admin.layouts.app')

@section('title') Update Open Events @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span>Update Open Events</h5>


                <a href="{{ route('admin.open-events.index') }}" class="btn btn-primary btn-sm">← Back</a>

            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.open-events.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="has-validation">
                            <input value="{{$data->name}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <div class="has-validation">
                            <input value="{{$data->name}}" type="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <div class="has-validation">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="4" rows="4">{!!$data->description!!}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                                <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12 text-end">

                        <a href="{{ route('admin.open-events.index') }}" class="btn btn-primary btn-sm">← Back</a>

                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:save"></iconify-icon>
                            </span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection